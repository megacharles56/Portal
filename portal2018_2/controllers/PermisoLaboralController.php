<?php

namespace app\controllers;

use Yii;
use app\models\PermisoLaboral;
use app\models\PermisoLaboralSearch;
use app\models\Vpermisos;
use app\models\Variables;
use app\models\Autorizaciones;
use app\models\Empleados;
use app\models\Usuarios;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\EmpleadosController;
use app\models\Nolaborales;
use app\models\VpermisolaboralSearch;

/**
 * PermisoLaboralController implements the CRUD actions for PermisoLaboral model.
 */
class PermisoLaboralController extends Controller {

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
                        . ' and ( permi_metodo = :action or permi_metodo = ' . "'*'" .
                        ' ) order by permi_nivel', ['clase' => 'PermisoLaboral',
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
                        'actions' => ['index', 'view', 'update', 'delete', 'create', 'permisos',
                            'elimina', 'eliminaAdmin', 'add', 'addBatch'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public static function getdp($searchModel, $nivel) {
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = Yii::$app->params['lineasXgrid'];
        switch ($nivel) {
            case 1 : {
                    break;
                };
            case 2 : {
                    $dataProvider->query->andFilterWhere(['autor' => yii::$app->user->identity->getId()]);
                    break;
                }
        }
        return $dataProvider;
    }

    /**
     * Lists all PermisoLaboral models.
     * @return mixed
     */
    public function actionIndex() {
        $this->canIndex('index', $nivel);
        $searchModel = new VpermisolaboralSearch();
        $dataProvider = $this->getdp($searchModel, $nivel);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PermisoLaboral model.
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

    /**
     * Creates a new PermisoLaboral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->can('create');
        $model = new PermisoLaboral();
        if ($model->load(Yii::$app->request->post())) {
            $model->autor = yii::$app->user->identity->getPerso();
            $usua = Usuarios::find()->where(['usuar_id' => $model->autor])->one();
            $emple = Empleados::find()->where(['emple_id' => $usua->usuar_relacion_id])->one();
            $model->emple_id = $emple->emple_id;
            $model->estad_id = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO',
                        'varia_cadena' => 'SOLICITADO'])->varia_id;
            if ($model->save()) {
                $autoriza = new Autorizaciones();
                $autoriza->autor_autoriza = $emple->emple_jefe;
                $autoriza->perla_id = $model->perla_id;
                $autoriza->save();

                // mandar correo 

                return $this->redirect(['view', 'id' => $model->perla_id]);
            } else {// revisar que se hari si no se pudo salvar   
            }
        }
        $model->perla_tipo = 'horas';
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * crea en batch nuevosPermisoLaboral modelos hijos de una table.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddBatch($idMaster) {
        $this->can('addBatch');
        $model = new PermisoLaboral();
        if ($model->load(Yii::$app->request->post())) {
            $ri = $model->regis_id;
            //$model->asist_consecutivo = $this->getConsecutivo($ri);
            if (isset($_POST['accion']) and $_POST['accion'] == 'Terminar') {
                // si se de dar d alta al registro uno no se ha registrado ninguno mandar error
                if ($model->asist_consecutivo == 1) {
                    $model = new PermisoLaboral();
                    $model->regis_id = $regis;
                    return $this->render('alta', [
                                'model' => $model, 'regis' => $ri,
                                'warning' => 'Debe dar de alta al menos a un asistente.']);
                }
                $this->redirect(['registro-evento/preregistro', 'regis_id' => $model->regis_id]);
                return;
            }
            if ($model->save()) {
                return $this->redirect(['PermisoLaboral/add', 'regis' => $ri]);
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

    function diasHabilesenPeriodo($dia1, $dia2) {
        $d = $dia1;
        $habiles = 0;
        do {
            $ds = date('N', strtotime($d));
            if (( $ds > 0 ) && ($ds < 6)) {
                $nolab = Nolaborales::findAll(['nolab_dia' => $d]);
                if (sizeof($nolab) == 0)
                    $habiles++;
            }
            $d = date('m/d/Y', strtotime($d . ' +1 day'));
        } while ($d <= $dia2);
        return $habiles;
    }

    /**
     * crea en batch nuevosPermisoLaboral modelos hijos de una table.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd($idMaster) {
        $model = new PermisoLaboral();
        $model->autor = yii::$app->user->identity->getPerso();
        $solicitado = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'SOLICITADO'])->varia_id;
        $model->estad_id = $solicitado;
        if ($model->load(Yii::$app->request->post())) {
            $model->autor = yii::$app->user->identity->getPerso();
            $model->estad_id = $solicitado;
            //     throw new NotFoundHttpException('No pudo salvar ' . $model->dia1 . "----");
            if ($model->perla_tipo == 'dias') {
                $model->perla_dia_inicial = $model->dia1;
                $model->perla_dia_final = $model->dia2;
            }
            $model->emple_id = yii::$app->user->identity->getEmple();
            $vacaciones = Variables::findOne(['varia_tabla' => 'permiso_laboral',
                        'varia_campo' => 'perla_asunto', 'varia_cadena' => 'Vacaciones'])->varia_id;
            $emple = $model->emple;

            if ($vacaciones == $model->perla_asunto) {
                // si son vacaciones debere buscar cuantos dias son habiles
                $solicitados = $this->diasHabilesenPeriodo($model->perla_dia_inicial, $model->perla_dia_final);
                if ($emple->emple_cantidad_dias < $solicitados) {
                    $model->perla_observaciones = $model->perla_observaciones .
                            '  EL EMPLEADO NO TIENE SUFICIENTES DIAS DISṔONIBLES. SOLICITA ' . $solicitados .
                            ' Y TIENE ' . $emple->emple_cantidad_dias . ' DISPONIBLES';
                }
            }

            if ($model->save()) {
                $autoriza = new Autorizaciones();
                $usrJfe = Usuarios::find()->where(['usuar_relacion_id'=>$emple->emple_jefe])->one();
                $autoriza->autor_autoriza = $usrJfe->usuar_id;
                $autoriza->perla_id = $model->perla_id;
                $autoriza->save();
                $nombreempl = $emple->perso->perso_nombre;
                $nombreJfe = $emple->empleJefe->perso->perso_nombre;
               // $usrJfe = Usuarios::find()->where(['usuar_relacion_id' => $autoriza->autor_autoriza])->one();
                $correoJfe = $usrJfe->usuar_correo_1;
                if ($correoJfe && $correoJfe <> '') {
                    $message = Yii::$app->mailer->compose();
                    $message->setFrom('aazcona@ccmexico.com.mx');
                    $message->setTo($correoJfe)
                            ->setSubject('solicitud de permiso por autorizar de ' . $nombreempl)
                            ->setTextBody("Estimado " . $nombreJfe. ' el empleado '.  $nombreempl . 
                                    "solicita autorizacion de permiso. favor de ingresar a su panel")
                            ->send();
                }
                return $this->redirect(['empleados/panel', 'id' => $emple->emple_id]);
            } else {
                $e = var_dump($model->getErrors());

                Yii::trace('error al asalvar :' . $e);
                throw new NotFoundHttpException('No pudo salvar ' . $model->perla_id . "-" . $e);
            }
        } else {
            $model->emple_id = yii::$app->user->identity->getEmple();
            $model->emple->revisaAntiguedad();
            $model->perla_tipo = 'horas';
            return $this->render('add', [
                        'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing PermisoLaboral model.
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
                return $this->redirect(['view', 'id' => $model->perla_id]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PermisoLaboral model.
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
     * Finds the PermisoLaboral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PermisoLaboral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PermisoLaboral::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
