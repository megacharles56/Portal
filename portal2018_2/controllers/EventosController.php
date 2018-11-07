<?php

namespace app\controllers;

use Yii;
use app\models\Eventos;
use app\models\EventosSearch;
use app\models\Vpermisos;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\VeventosSearch;
use app\models\CalendarioEventos;
USE app\models\Variables;


/**
 * EventosController implements the CRUD actions for Eventos model.
 */
class EventosController extends Controller {
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
                        . ' and ( permi_metodo = :action or permi_metodo = ' . "'*'" . ')', ['clase' => 'Eventos',
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
        if (Yii::$app->user->isGuest) {
            $rules = [
                [
                    'allow' => true,
                    'actions' => ['calendario'],
                    'roles' => ['?'],
                ],
            ];
        } else {
            $rules = [
                [
                    'allow' => true,
                   'actions' => ['index', 'view', 'add', 'calendario',
                            'update', 'delete', 'create', 'permisos',
                            'elimina', 'eliminaAdmin', 'add', 'addBatch', 'reporte'],
                    'roles' => ['@'],
                ],
            ];
        }                
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $rules,
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
                    break;
 //$dataProvider->query->andFilterWhere(['event_id' => $id,]);
                }
        }
        return $dataProvider;
    }

    public function actionIndex() {
        $this->canIndex('index', $nivel);
        $searchModel = new EventosSearch();
        $dataProvider = $this->getdp($searchModel, $nivel);

        return $this->render('index_1', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Eventos models.
     * @return mixed
     */
    public function actionReporte() {
        $this->canIndex('index', $nivel);
        $searchModel = new VeventosSearch();
        $dataProvider = $this->getdp($searchModel, $nivel);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Eventos models.
     * @return mixed
     */
    public function actionCalendario() {

        $calendario =  new CalendarioEventos();
        $searchModel = new EventosSearch();
        $dataProvider = $this->getdp($searchModel, 1);
        $calendario->ubicacion = Variables::findOne(['varia_tabla' => 'SALONES', 'varia_campo' => 'UBICACION','varia_cadena'=>'CANACO'])->varia_id;
        $calendario->fecha = date('m/d/Y', time());
        if ($calendario->load(Yii::$app->request->post())) {
             $calendario->fecha =  $_POST['CalendarioEventos']['fecha'];
        }
        return $this->render('calendario', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
            'calendario'=>$calendario
        ]);
    }

    /**
     * Displays a single Eventos model.
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

    function CheckCrash($model, &$warning) {
        $s = $model->salon_id;
        $f = $model->event_fecha;
        $dia_salon = Eventos::find()->
                        where("((salon_id = $s) and ( event_fecha = '$f'))")->all();

        $choque = false;
        $warning = 'reviso ';
        foreach ($dia_salon as $ds) {
            if ($model->event_id == $ds->event_id)
                continue;
            $F = $model->event_fin;
            $I = $model->event_inicio;
            $terminaDentro = (($F > $ds->event_inicio) and ( $F < $ds->event_fin));
            $iniciaDentro = ( ($I > $ds->event_inicio) and ( $I < $ds->event_fin) );
            $abarca = (( $I < $ds->event_inicio ) and ( $ds->event_fin < $F));
            if ($iniciaDentro)
                $tc = ' Inicia evento(' . $ds->event_evento . ') I:' . $I . ' < ' . $ds->event_inicio . '/ ' . $ds->event_fin . '>';
            if ($terminaDentro)
                $tc = ' Termina evento (' . $ds->event_evento . ') F:' . $F . ' < ' . $ds->event_inicio . '/' . $ds->event_fin . '>';
            if ($abarca)
                $tc = ' Abarca evento (' . $ds->event_evento . ')';
            if (($iniciaDentro) or ( $terminaDentro ) or ( $abarca)) {
                $choque = true;
                $warning = "No se puede registrar el evento :  $tc";
                return $choque;
                break;
                ;
            }
            return $choque;
        }
    }

    function horasValidas($model, &$warning) {
        if ($model->event_fin <= $model->event_inicio) {
            $warning = 'Revise las Horas de inicio y fin';
            return false;
        } else
            return true;
    }

    /**
     * Creates a new Eventos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->can('create');
        $model = new Eventos();
        $choque = false;
        $warning = '';
        if ($model->load(Yii::$app->request->post())) {
            $choque = $this->CheckCrash($model, $warning);
            if (!$choque && $this->horasValidas($model, $warning)) {
                $model->autor = yii::$app->user->identity->getPerso();
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->event_id]);
                } else {// revisar que se hari si no se pudo salvar
                }
            }
        }
        return $this->render('create', [
                    'model' => $model, 'warning' => $warning]);
    }

    /**
     * crea en batch nuevosEventos modelos hijos de una table.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddBatch($idMaster) {
        $this->can('addBatch');
        $model = new Eventos();
        if ($model->load(Yii::$app->request->post())) {
            $ri = $model->regis_id;
            if (isset($_POST['accion']) and $_POST['accion'] == 'Terminar') {
                if ($model->asist_consecutivo == 1) {
                    $model = new Eventos();
                    $model->regis_id = $regis;
                    return $this->render('alta', [
                                'model' => $model, 'regis' => $ri,
                                'warning' => 'Debe dar de alta al menos a un asistente.']);
                }
                $this->redirect(['registro-evento/preregistro', 'regis_id' => $model->regis_id]);
                return;
            }
            if ($model->save()) {
                return $this->redirect(['Eventos/add', 'regis' => $ri]);
            } else {
                $e = var_dump($model->getErrors());
                Yii::trace('error al asalvar :' . $e);
                throw new NotFoundHttpException('No pudo salvar ' . $model->regis_id . "-" . $e);
            }
        } else {
            $registro = RegistroEvento::findOne(['regis_id' => $regis]);
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
     * crea en batch nuevosEventos modelos hijos de una table.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd($idMaster) {
        $this->can('add');
        $model = new Eventos();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save())
                return $this->redirect(['Eventos/view', 'id' => $model->perca_id]);
        }
        else {
            $model->perca_id = $perca_id;
            return $this->render('add', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Eventos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $this->can('update', $model);
        $warning = '0';
        if ($model->load(Yii::$app->request->post())) {
            $choque = $this->CheckCrash($model, $warning);
            if (!$choque && $this->horasValidas($model, $warning)) {
                $warning = 'revision complet';
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->event_id]);
                }
            }
        }
        return $this->render('update', [
                    'model' => $model, 'warning' => $warning]);
    }

    /**
     * Deletes an existing Eventos model.
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
     * Finds the Eventos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Eventos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Eventos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

// hay que ver si hay salones relacionados y bloquearlos
/*
  el salon tiene relacionados :
 *  for each relacionado escribir evento
 * el salon es un relacionado, bloquear al padre
 */
