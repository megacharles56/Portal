<?php

namespace app\controllers;

use Yii;
use app\models\Archivos;
use app\models\ArchivosSearch;
use app\models\Vpermisos;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Usuarios;
use app\models\Empleados;

/**
 * ArchivosController implements the CRUD actions for Archivos model.
 */
class ArchivosController extends Controller {

    public function getAllowed($model = null) {
        $r = true;
        return $r;
    }

    public function ifcanIndex($action, &$nivel, $model = null) {
        $usr = Yii::$app->user->identity->usuar_id;
        $puede = Vpermisos::findBySql(
                        'select * from vpermisos where' . ''
                        . ' (usuar_id = :usr)'
                        . ' and ( permi_clase = :clase or permi_clase = ' . "'*'" . ')'
                        . ' and ( permi_metodo = :action or permi_metodo = ' . "'*'" . ')', ['clase' => 'Archivos',
                    'usr' => $usr,
                    'action' => $action])->all();
        $r = false;
        if (sizeof($puede) > 0) {
            $r = true;
            $nivel = $puede[0]->permi_nivel;
            if (!is_null($model)) {
                switch ($nivel) {
                    case 0 : {
                            $r = true;
                            break; //puede actura en todos
                        }
                    case 1 : {
                            $r = false;
                            break; //hay que estudiar cada caso por separado 
                        }
                    case 0 : {
                            $r = $model->usuar_id == $usr;  // se presume que la tabla tiene un usuar_id
                        }
                }
            }
        }
        return $r;
    }

    public function ifcan($action, $model = null) {
        $nivel = -1;
        return $this->ifcanIndex($action, $nivel, $model);
    }

    public function can($action, $model = null) {
        $nivel = -1;
        return $this->ifcan($action, $nivel, $model);
    }

    public function canIndex($action, &$nivel, $model = null) {
        if (!$this->ifcanIndex($action, $nivel, $model)) {
            $this->redirect(['site/forbid']);
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'add', 'update', 'delete', 'create', 'permisos', 'elimina', 'eliminaAdmin', 'add', 'addBatch'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public static function getdp($searchModel, $nivel) {
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        switch ($nivel) {
            case 1 : {
                    break;
                };
            case 2 : {
                    break;
//$dataProvider->query->andFilterWhere(['event_id' => $id,]);
                }
        }
        return $dataProvider;
    }

    /**
     * Lists all Archivos models.
     * @return mixed
     */
    public function actionIndex() {
        $this->canIndex('index', $nivel);
        $searchModel = new ArchivosSearch();
        $dataProvider = $this->getdp($searchModel, $nivel);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Archivos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $this->can('view');
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    function almacenaFoto($model, $foto1, $campoFoto, $nombreFoto, $d = "../hoteles/") {

        if ($foto1) {
            $f = $d . $model[$campoFoto];
            if (!file_exists($f)) {
                unlink($f);
            }
            $model[$campoFoto] = $nombreFoto . '.' . $foto1->extension;
            $r = $foto1->saveAs($d . $model[$campoFoto]);
            $model->save();
        }
    }

    /**
     * Creates a new Archivos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->can('create');
        $model = new Archivos();
        if ($model->load(Yii::$app->request->post())) {
            $model->autor = yii::$app->user->identity->getPerso();
            $usua = Usuarios::find()->where(['usuar_id' => $model->autor])->one();
            $emple = Empleados::find()->where(['emple_id' => $usua->usuar_relacion_id])->one();
            $model->emple_id = $emple->emple_id;

            $foto1 = UploadedFile::getInstance($model, '_archivo');

            if ($model->save() ) {

                $d = "../archivos/";
                $nameRoot = $model->archi_id . '_';

                $this->almacenaFoto($model, $foto1, 'archi_archivo', $nameRoot . 'pic', $d);
                return $this->redirect(['view', 'id' => $model->archi_id]);
            } else {// revisar que se hari si no se pudo salvar   
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * crea en batch nuevosArchivos modelos hijos de una table.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddBatch($idMaster) {
        $this->can('addBatch');
        $model = new Archivos();
        if ($model->load(Yii::$app->request->post())) {
            $ri = $model->regis_id;
//$model->asist_consecutivo = $this->getConsecutivo($ri);
            if (isset($_POST['accion']) and $_POST['accion'] == 'Terminar') {
// si se de dar d alta al registro uno no se ha registrado ninguno mandar error
                if ($model->asist_consecutivo == 1) {
                    $model = new Archivos();
                    $model->regis_id = $regis;
                    return $this->render('alta', [
                                'model' => $model, 'regis' => $ri,
                                'warning' => 'Debe dar de alta al menos a un asistente.']);
                }
                $this->redirect(['registro-evento/preregistro', 'regis_id' => $model->regis_id]);
                return;
            }
            if ($model->save()) {
                return $this->redirect(['Archivos/add', 'regis' => $ri]);
            } else {
                $e = var_dump($model->getErrors());
                Yii::trace('error al asalvar :' . $e);
                throw new NotFoundHttpException('No pudo salvar ' . $model->regis_id . "-" . $e);
            }
        } else {
            $registro = RegistroEvento::findOne(['regis_id' => $regis]);
// es redundante pero previene algun error
            if (isset($registro)) {
                $model->regis_id = $registro->regis_id;
                return $this->render('addBatch', [
                            'model' => $model, 'idMaster' => $idMaster, 'fieldMaster' => $fieldMaster
                            , 'warning' => ''
                ]);
            } else {
                throw new NotFoundHttpException('No pudo encontrar el registro' . $regis . "-");
            }
        }
    }

    /**
     * crea en batch nuevosArchivos modelos hijos de una table.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd($idMaster) {
        $this->can('add');
        $model = new Archivos();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save())
                return $this->redirect(['Archivos/view', 'id' => $model->perca_id]);
        }
        else {
            $model->perca_id = $perca_id;
            return $this->render('add', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Archivos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $this->can('update', $model);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->archi_id]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Archivos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $this->can('delete', $model);
        $this->findModel($id)->delete();
        /*
          $model->perca_estado = 'inactivo';
          $model->save();
         */
        return $this->redirect(['index']);
        ;
    }

    public function actionEliminaAdmin($id) {
        /** supone un maestro detalle
          $model = $this->findModel($id);
          $this->can('eliminaAdmin', $model);

          $registro = $model->regis_id;
          $this->findModel($id)->delete();
          return $this->redirect(['padre/view', 'id' => $registro,]);
         * 
         */
    }

    public function actionElimina($id) {
        $modelo = $this->findModel($id);
        $registro = $modelo->regis_id;
        $asistente->delete();
        return $this->redirect(['add', 'regis' => $registro,]);
    }

    /**
     * Finds the Archivos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Archivos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Archivos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
