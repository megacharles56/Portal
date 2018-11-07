<?php

namespace app\controllers;

use Yii;
use app\models\Autorizaciones;
use app\models\AutorizacionesSearch;
use app\models\Vpermisos;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Empleados;
use app\models\Personas;
use app\models\Variables;
use app\models\Usuarios;
use app\models\PerfilesPuesto;
use kartik\mpdf\Pdf;
use app\models\Nolaborales;

/**
 * AutorizacionesController implements the CRUD actions for Autorizaciones model.
 */
class AutorizacionesController extends Controller {

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
                        . ' and ( permi_metodo = :action or permi_metodo = ' . "'*'" . ')', ['clase' => 'Autorizaciones',
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
                        'actions' => ['index', 'view', 'add', 'update',
                            'delete', 'create', 'permisos', 'elimina', 'eliminaAdmin', 'add', 'addBatch',
                            'autoriza'],
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
                    break;
//$dataProvider->query->andFilterWhere(['event_id' => $id,]);
                }
        }
        return $dataProvider;
    }

    /**
     * Lists all Autorizaciones models.
     * @return mixed
     */
    public function actionIndex() {
        $this->canIndex('index', $nivel);
        $searchModel = new AutorizacionesSearch();
        $dataProvider = $this->getdp($searchModel, $nivel);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Autorizaciones model.
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
     * Creates a new Autorizaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->can('create');
        $model = new Autorizaciones();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->autor = yii::$app->user->identity->getPerso();
                return $this->redirect(['view', 'id' => $model->autor_id]);
            } else {// revisar que se hari si no se pudo salvar   
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * crea en batch nuevosAutorizaciones modelos hijos de una table.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddBatch($idMaster) {
        $this->can('addBatch');
        $model = new Autorizaciones();
        if ($model->load(Yii::$app->request->post())) {
            $ri = $model->regis_id;
            //$model->asist_consecutivo = $this->getConsecutivo($ri);
            if (isset($_POST['accion']) and $_POST['accion'] == 'Terminar') {
                // si se de dar d alta al registro uno no se ha registrado ninguno mandar error
                if ($model->asist_consecutivo == 1) {
                    $model = new Autorizaciones();
                    $model->regis_id = $regis;
                    return $this->render('alta', [
                                'model' => $model, 'regis' => $ri,
                                'warning' => 'Debe dar de alta al menos a un asistente.']);
                }
                $this->redirect(['registro-evento/preregistro', 'regis_id' => $model->regis_id]);
                return;
            }
            if ($model->save()) {
                return $this->redirect(['Autorizaciones/add', 'regis' => $ri]);
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
     * crea en batch nuevosAutorizaciones modelos hijos de una table.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd($idMaster) {
        $this->can('add');
        $model = new Autorizaciones();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save())
                return $this->redirect(['Autorizaciones/view', 'id' => $model->autor_autoriza]);
        }
        else {
            $model->autor_autoriza = $idMaster;
            return $this->render('add', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Autorizaciones model.
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
                return $this->redirect(['view', 'id' => $model->autor_id]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Autorizaciones model.
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

    public function generaPDF($permiso, $actores) {
        $content = $this->renderPartial('solicitudPermiso', ['actores' => $actores, 'permiso' => $permiso]);
        $pdf = Yii::$app->pdf;
        $pdf->filename = 'permiso_' . $permiso->perla_id . '.pdf';
        $pdf->content = $content;
        $pdf->destination = Pdf::DEST_FILE;
        $pdf->render();
        return $pdf;
    }

    public function getActores($permiso) {
        $e_solicitante = Empleados::find()->where(['perso_id' => $permiso->autor])->one();
        $u_solicitante = Usuarios::find()->where(['usuar_relacion_id' => $e_solicitante->emple_id])->one();
        $e_firmante = Empleados::findOne(yii::$app->user->identity->getEmple());
        $u_firmante = usuarios::findOne(yii::$app->user->identity->getId());
        $e_superior = $e_firmante->empleJefe;
        if ($e_superior)
            $u_superior = Usuarios::find()->where(['usuar_relacion_id' => $e_superior->emple_id])->one();
        else
            $u_superior = '--';
        $pp = PerfilesPuesto::find()->where(['perpu_nombre' => 'JEFE', 'perpu_complemento' => 'RECURSOS HUMANOS'])->one();
        $jefeRH = $pp->empleados[0];
        $u_jefeRH = Usuarios::find()->where(['usuar_relacion_id' => $jefeRH->emple_id])->one();

        $actores = [];
        $actores = ['solicitante' =>
            ['usr' => $u_solicitante->usuar_id,
                'empl' => $e_solicitante->emple_id,
                'name' => $e_solicitante->perso->perso_nombre,
                'mail' => $u_solicitante->usuar_correo_1,
                'nomina' => $e_solicitante->emple_num_nomina
            ],
            'firmante' =>
            ['usr' => $u_firmante->usuar_id,
                'empl' => $e_firmante->emple_id,
                'name' => $e_firmante->perso->perso_nombre,
                'mail' => $u_firmante->usuar_correo_1,
                'puesto' => $e_firmante->perpu->perpu_nombre,
            ],
            'superior' => isset($u_superior->usuar_id) ?
            ['usr' => $u_superior->usuar_id,
        'empl' => $e_firmante->empleJefe->emple_id,
        'name' => $e_superior->perso->perso_nombre,
        'mail' => $u_superior->usuar_correo_1
            ] :
            ['usr' => 'sin',
        'empl' => 'sin',
        'name' => 'sin',
        'mail' => 'sin'
            ]
            ,
            'RH' =>
            ['usr' => $u_jefeRH->usuar_id,
                'empl' => $jefeRH->emple_id,
                'name' => $jefeRH->perso->perso_nombre,
                'mail' => $u_jefeRH->usuar_correo_1
        ]];
        return $actores;
    }

    function diasHabilesenPeriodo($dia1, $dia2) {
        $d = $dia1;
        $habiles = 0;
        $watchDog = 0;
        do {
            $ds = date('N', strtotime($d));
            if (( $ds > 0 ) && ($ds < 6)) {
                $nolab = Nolaborales::findAll(['nolab_dia' => $d]);
                if (sizeof($nolab) == 0)
                    $habiles++;
            }
            $d = date('m/d/Y', strtotime($d . ' +1 day'));
            ++$watchDog;
            if ($watchDog > 40)
                throw new NotFoundHttpException('$watchDog > 40 !! 1)' . $dia1 . ' 2)' . $dia2 . ' i)' . $d);
        } while (strtotime($d) <= strtotime($dia2));
        return $habiles;
    }

    /* el firmante 1 sera el director */
    /* firmante 2 se actualizara segun se de de alta */

    public function actionAutoriza($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                // se actualiza el asunto, pej de "con sueldo" a "sin sueldo"
                $permiso = $model->perla;
                if ($model->perla_asunto <> $permiso->perla_asunto) {
                    $permiso->perla_asunto = $model->perla_asunto;
                }
               
                $actores = $this->getActores($permiso);
                /*
                  print_r($actores);
                  RETURN;
                -*/
                if ($model->autor_autorizacion === 'SI') {
                    if ($actores['firmante']['puesto'] === 'DIRECTOR') {

                        // restar los dias solicitados 
                        $vacaciones = Variables::findOne(['varia_tabla' => 'permiso_laboral',
                                    'varia_campo' => 'perla_asunto', 'varia_cadena' => 'Vacaciones'])->varia_id;
                        $permiso = $model->perla;
                        if ($vacaciones == $permiso->perla_asunto) {
                            $emple = $permiso->emple;
                            $solicitados = $this->diasHabilesenPeriodo(
                                    $permiso->perla_dia_inicial, $permiso->perla_dia_final);
                            $emple->emple_cantidad_dias = $emple->emple_cantidad_dias - $solicitados;
                            $emple->save();
                        }

                        $estado = 'AUTORIZADO';
                        $permiso->perla_firmante_1 = $actores['firmante']['usr'];
                        // enviar mail a RH y al empleado
                        $permiso->save();
                        $pdf = $this->generaPDF($permiso, $actores);
                        // $pdf->Output('../../../../../../../../dermiso.pdf', 'D');
                        $message = Yii::$app->mailer->compose();
                        $message->setFrom($actores['firmante']['mail']); // $u_firmante->usuar_correo_1);
                        $message->setTo($actores['solicitante']['mail'])
                        ->setSubject('solicitud de permiso ')
                        ->setTextBody($actores['solicitante']['name'] . " su permiso ha sido autorizado, favor de ingresar su panel")
                        //   ->attach('permiso.pdf')
                        ->attach($pdf->filename)
                        ->send();
                        
                        $message = Yii::$app->mailer->compose();
                        $message->setFrom($actores['firmante']['mail']); // $u_firmante->usuar_correo_1);
                        $message->setTo($actores['RH']['mail'])
                        ->setSubject('solicitud de permiso ')
                        ->setTextBody($actores['RH']['name'] . ", se autoeizo un permiso a ".$actores['solicitante']['name']. ' Número de nómina '. $actores['solicitante']['nomina'])
                        //   ->attach('permiso.pdf')
                        ->attach($pdf->filename)
                        ->send();
                        
                        
                        
                        
                    } else {
                        /* Se crea la solictud de autorizacion para el siguiente nivel */

                        $permiso->perla_firmante_2 = $actores['firmante']['usr'];
                        $estado = 'EN ATENCION';

                        $autoriza = new Autorizaciones();
                        $autoriza->autor_autoriza = $actores['superior']['usr']; //$u_superior;
                        $autoriza->perla_id = $model->perla_id;
                        $autoriza->save();

                        //  si existe correo enviarlo
                        if ($actores['superior']['mail'] && $actores['superior']['mail'] <> '') {
                            $message = Yii::$app->mailer->compose();
                            $message->setFrom($actores['firmante']['mail']); // $u_firmante->usuar_correo_1);
                            $message->setTo($actores['superior']['mail'])
                                    ->setSubject('solicitud de permiso por autorizar')
                                    ->setTextBody('Estimado '.   $actores['superior']['name'] . '\n '. $actores['solicitante']['name'] . "solicita autorizacion de permiso. Favor de ingresar a su panel")
                                    ->send();
                        }
                    }
                } else {
                    $estado = 'DENEGADO';
                    $permiso->perla_firmante_1 = $actores['firmante']['usr'];
                    // enviar mail a RH y al empleado

                    $message = Yii::$app->mailer->compose();
                    $message->setFrom($actores['firmante']['mail']); // $u_firmante->usuar_correo_1);
                    $message->setTo($actores['solicitante']['mail'])
                            ->setSubject('solicitud de permiso ')
                            ->setTextBody($actores['solicitante']['name'] . " su permiso NO ha sido autorizado")
                            ->send();
                }
                $permiso->estad_id = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => $estado])->varia_id;
                $permiso->save();
            }
            return $this->redirect(['empleados/panel']);
        }

        $model->perla_asunto = $model->perla->perla_asunto;
        return $this->render('autoriza', [
                    'model' => $model,
        ]);
    }

    /**
     * Finds the Autorizaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Autorizaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Autorizaciones::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
