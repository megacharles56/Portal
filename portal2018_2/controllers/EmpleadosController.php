<?php

namespace app\controllers;

use Yii;
use app\models\Empleados;
use app\models\EmpleadosSearch;
use app\models\Vpermisos;
use app\models\Usuarios;
use app\models\Vempleados;
use app\models\Roles;
use app\models\UsuarRol;
use app\models\Variables;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Personas;
use app\models\Domicilios;
use app\models\VempleadosSearch;

/**
 * EmpleadosController implements the CRUD actions for Empleados model.
 */
class EmpleadosController extends Controller {

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
                        . ' and ( permi_metodo = :action or permi_metodo = ' . "'*'" . ')', ['clase' => 'Empleados',
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
                    'actions' => ['index', 'view'],
                    'roles' => ['?'],
                ],
            ];
        } else {
            $rules = [
                [
                    'allow' => true,
                    'actions' => ['index', 'admin', 'view', 'add', 'update',
                        'delete', 'create', 'permisos', 'elimina',
                        'eliminaAdmin', 'add', 'addBatch', 'chart',
                        'panel', 'capture', 'capture1', 'pass', 'extmail'],
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
        $dataProvider->sort = ['defaultOrder' => ['emple_num_nomina' => SORT_ASC]];



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
     * Lists all Empleados models.
     * @return mixed
     */
    public function actionAdmin() {
        $activo = Variables::findOne(['varia_tabla' => '*',
                    'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;        
        $this->canIndex('index', $nivel);
        $searchModel = new VempleadosSearch();
        $searchModel->estad_id = $activo;        
        $dataProvider = $this->getdp($searchModel, $nivel);

        $model = new empleados();

        return $this->render('admin', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model]);
    }

    /**
     * Lists all Empleados models.
     * @return mixed
     */
    public function actionIndex() {
        $activo = Variables::findOne(['varia_tabla' => '*',
                    'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;
        $nivel = 0;
        $searchModel = new VempleadosSearch();
        $searchModel->estad_id = $activo;
        $dataProvider = $this->getdp($searchModel, $nivel);


        $model = new empleados();

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model]);
    }

    /**
     * Displays a single Empleados model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
//  $this->can('view');
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Empleados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->can('create');
        $model = new Empleados();
        if ($model->load(Yii::$app->request->post())) {
            $model->autor = yii::$app->user->identity->getPerso();
            $model->estad_id = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;
            if ($model->save()) {
                $usuario = new Usuarios();
                $usuario->usuar_usuario = $model->emple_usuario;
                $usuario->usuar_clave = $model->emple_clave_sistemas;
                $usuario->usuar_nombre = $model->perso->perso_nombre1 . $model->perso->perso_paterno;
                $usuario->usuar_relacion_id = $model->emple_id;
                $usuario->usuar_relacion_nombre = 'Empleados';
                $usuario->usuar_correo_1 = $usuario->usuar_usuario . '@ccmexico.com.mx';
                //$usuario->usuar_status = 0;
                $usuario->save();

                $rolE = Roles::findOne(['rol_nombre' => 'Empleado']);
                $rolA = new UsuarRol();
                $rolA->usuar_id = $usuario->usuar_id;
                $rolA->rol_id = $rolE->rol_id;
                $rolA->save();
                return $this->redirect(['view', 'id' => $model->emple_id]);
            } else {// revisar que se hari si no se pudo salvar   
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * crea en batch nuevosEmpleados modelos hijos de una table.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddBatch($idMaster) {
        $this->can('addBatch');
        $model = new Empleados();
        if ($model->load(Yii::$app->request->post())) {
            $ri = $model->regis_id;
//$model->asist_consecutivo = $this->getConsecutivo($ri);
            if (isset($_POST['accion']) and $_POST['accion'] == 'Terminar') {
// si se de dar d alta al registro uno no se ha registrado ninguno mandar error
                if ($model->asist_consecutivo == 1) {
                    $model = new Empleados();
                    $model->regis_id = $regis;
                    return $this->render('alta', [
                                'model' => $model, 'regis' => $ri,
                                'warning' => 'Debe dar de alta al menos a un asistente.']);
                }
                $this->redirect(['registro-evento/preregistro', 'regis_id' => $model->regis_id]);
                return;
            }
            if ($model->save()) {
                return $this->redirect(['Empleados/add', 'regis' => $ri]);
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
     * crea en batch nuevosEmpleados modelos hijos de una table.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd() {
        $this->can('add');
        $emple = new Empleados();
        $perso = new Personas();
        $domic = new Domicilios();

        if ($emple->load(Yii::$app->request->post())) {
            if ($perso->load(Yii::$app->request->post())) {
                $domic->load(Yii::$app->request->post());   // no se esta validando

                $autor = yii::$app->user->identity->getPerso();
                
                $estad_id = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;
                
                $perso->autor = $autor;
                
                $perso->estad_id = $estad_id;
                $emple->autor = $autor;
                $emple->estad_id = $estad_id;

                $segundoUsuario = Empleados::find()->where(['emple_usuario' => $emple->emple_usuario])->all();
                $segundoNumNomina = Empleados::find()->where(['emple_num_nomina' => $emple->emple_num_nomina])->all();

                // Se revisan los campos que deben ser unicos en empleados
                $letrero = '';
                if (sizeof($segundoUsuario) > 0) {
                    $letrero = "Ya existe un empleado con el usuario " . $emple->emple_usuario . ' eliga otro';
                }
                if (sizeof($segundoNumNomina) > 0) {
                    $letrero = "Ya existe ese numero de nomina (" . $emple->emple_num_nomina . ' ' . $segundoNumNomina[0]->perso->perso_nombre . ') favor de revisar.';
                }
                if ($letrero <> '') {
                    Yii::$app->session->setFlash('error', $letrero);
                    return $this->render('add', [
                                'emple' => $emple,
                                'perso' => $perso,
                                'domic' => $domic
                    ]);
                }
                

                $emple->validate();
                $perso->validate();
                $domic->validate();
                $epers = $perso->errors;
                $eemple = $emple->errors;
                $edomic = $domic->errors;
                /*
                  Yii::$app->session->setFlash('error', "No fue posible almacenar el empleado, capture la pantalla y avise a sistemas.");
                  return $this->render('add', [
                  'emple' => $emple,
                  'perso' => $perso,
                  'domic' => $domic
                  ]);
                 */

                if (sizeof($eemple) <> 1 || !isset($eemple['perso_id'][0]) || ($eemple['perso_id'][0] <> '# Persona cannot be blank.')) {
                    Yii::$app->session->setFlash('error', "No fue posible almacenar el empleado, capture la pantalla y avise a sistemas.");
                    return $this->render('add', [
                                'emple' => $emple,
                                'perso' => $perso,
                                'domic' => $domic
                    ]);
                }
                $domic->save();
                $perso->domic_id = $domic->domic_id;
                if ($perso->save()) {
                    $emple->perso_id = $perso->perso_id;
                    if ($emple->save()) {
                        /* crear usuario y poner sus permisos */
                        $usuario = new Usuarios();
                        $usuario->usuar_usuario = $emple->emple_usuario;
                        $usuario->usuar_clave = $emple->emple_clave_sistemas;
                        $usuario->usuar_nombre = $emple->perso->perso_nombre1 . $emple->perso->perso_paterno;
                        $usuario->usuar_relacion_id = $emple->emple_id;
                        $usuario->usuar_relacion_nombre = 'Empleados';
                        //$usuario->usuar_correo_1 = $usuario->usuar_usuario . '@ccmexico.com.mx';
                        $usuario->usuar_correo_1 = $emple->perso->perso_email;
                        //$usuario->usuar_status = 0;
                        $usuario->save();
                        return $this->redirect(['empleados/admin']);
                    }
                }
                return $this->redirect(['empleados/view', 'id' => $emple->emple_id]);
            }
        } else {
//   $emple->emple_lugar_trabajo = 'canaco';
            $emple->emple_descanso_semanal = 'S,D';
            $emple->emple_jornada_laboral = 'L-V';

//$perso->perso_nombre1 = 'alejandro';
            return $this->render('add', [
                        'emple' => $emple,
                        'perso' => $perso,
                        'domic' => $domic
            ]);
        }
    }

    /**
     * Updates an existing Empleados model.
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
                return $this->redirect(['view', 'id' => $model->emple_id]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Empleados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $this->can('delete', $model);
//   throw new NotFoundHttpException('Capture 1:   /n emple load');
        /*   $this->findModel($id)->delete();
         */
        
        /*$activo = Variables::findOne(['varia_tabla' => '*',
                    'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;        
        $this->canIndex('index', $nivel);
        $searchModel = new VempleadosSearch();
        $searchModel->estad_id = $activo; */
        
        
        
        $model->estad_id = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'ELIMINADO'])->varia_id;
        //$model->perca_estado = 'inactivo';
        $model->save();

        //return $this->redirect(['index']);
        return $this->redirect(['empleados/admin']);
    }

    public function actionEliminaAdmin($id) {
        /** supone un maestro detalle**/
          /*$model = $this->findModel($id);
          $this->can('eliminaAdmin', $model);*/
          
          
          
          /*$registro = $model->regis_id;
          $this->findModel($id)->delete();
          return $this->redirect(['padre/view', 'id' => $registro,]);*/
         
    }

    public function actionElimina($id) {
        throw new NotFoundHttpException('elimina');
        $modelo = $this->findModel($id);
        //$model->estad_id = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'ELIMINADO'])->varia_id;
        $registro = $modelo->regis_id;
        $asistente->delete();
        return $this->redirect(['add', 'regis' => $registro,]);
    }

    /**
     * Finds the Empleados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empleados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Empleados::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionChart() {
        $p = Yii::$app->request->post();

        if ($p['Vempleados']['emple_id']) {
            $emple_id = $p['Vempleados'] ['emple_id'];
        } else
        /* @todo deberia buscar el primero activo  */
            $emple_id = 1;
        return $this->render('chart', ['emple_id' => $emple_id]);
    }

    public function actionPanel() {
        $id = yii::$app->user->identity->getEmple();
//        $id = yii::$app->user->identity->getId();
//   throw new NotFoundHttpException('The !!!!!!!!!!!!!!!! page does not exist.' . $id);
        $model = $this->findModel($id);

//throw new NotFoundHttpException('panel .' . $model->emple_num_nomina);
        return $this->render('panel', [
                    'model' => $this->findModel($id),
        ]);
    }

    function dias_pasados($fecha_inicial, $fecha_final) {
        $dias = (strtotime($fecha_inicial) - strtotime($fecha_final)) / 86400;
        $dias = abs($dias);
        $dias = floor($dias);
        return $dias;
    }

    public static function revisaAntiguedad($id) {
        $model = $this->findModel($id);
        $hoy = date("Y/m/d");
        if (isset($model->emple_antiguedad)) {
            $diferencia = dias_pasados($hoy, $model->emple_antiguedad);
            if ($diferencia >= 365) {
                $model->antiguedad = date("Y");
//  throw new NotFoundHttpException('existia, se actualiza' . $model->antiguedad);
                $model - save();
            } else {
                throw new NotFoundHttpException('aun no es el año');
            }
        } else {
            $model->antiguedad = date("Y");
//  throw new NotFoundHttpException('no existia se pone.');
            $model->save();
        }
    }

    public function actionCapture1($perso_id) {
        $perso = personas::findOne($perso_id);
        $emple = new Empleados();
        $domic = new Domicilios();

        if ($emple->load(Yii::$app->request->post()) && ($emple->perpu_id )) {
            if ($perso->load(Yii::$app->request->post())) {
                $domic->load(Yii::$app->request->post());   // no se esta validando

                $autor = yii::$app->user->identity->getPerso();
                $estad_id = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;
                $emple->autor = $autor;
                $emple->estad_id = $estad_id;

                $emple->validate();
                $perso->validate();
                $domic->validate();
                $epers = $perso->errors;
                $eemple = $emple->errors;
                $edomic = $domic->errors;
                /*
                  Yii::$app->session->setFlash('error', "No fue posible almacenar el empleado, capture la pantalla y avise a sistemas.");
                  return $this->render('add', [
                  'emple' => $emple,
                  'perso' => $perso,
                  'domic' => $domic
                  ]);
                 */

                if (sizeof($eemple) <> 1 || !isset($eemple['perso_id'][0]) || ($eemple['perso_id'][0] <> '# Persona cannot be blank.')) {
                    Yii::$app->session->setFlash('error', "No fue posible almacenar el empleado, capture la pantalla y avise a sistemas.");
                    return $this->render('add', [
                                'emple' => $emple,
                                'perso' => $perso,
                                'domic' => $domic
                    ]);
                }

                $domic->save();

                $perso->domic_id = $domic->domic_id;
                if ($perso->save()) {
                    $emple->perso_id = $perso->perso_id;
                    if ($emple->save()) {
                        /* crear usuario y poner sus permisos */
                        $usuario = new Usuarios();
                        $usuario->usuar_usuario = $emple->emple_usuario;
                        $usuario->usuar_clave = $emple->emple_clave_sistemas;
                        $usuario->usuar_nombre = $emple->perso->perso_nombre1 . $emple->perso->perso_paterno;
                        $usuario->usuar_relacion_id = $emple->emple_id;
                        $usuario->usuar_relacion_nombre = 'Empleados';
                        $usuario->usuar_correo_1 = $usuario->usuar_usuario . '@ccmexico.com.mx';
                        //$usuario->usuar_status = 0;
                        $usuario->save();
                        return $this->redirect(['empleados/capture']);
                    }
                }
                return $this->redirect(['empleados/view', 'id' => $emple->emple_id]);
            }
        } else {
// throw new NotFoundHttpException('Capture 1:   /n emple load');

            if ($perso->empleados0)
                $emple = $perso->empleados0;
            if ($perso->domic)
                $domic = $perso->domic;
//   $emple->emple_lugar_trabajo = 'canaco';
            $emple->emple_descanso_semanal = 'S,D';
            $emple->emple_jornada_laboral = 'L-V';
            $emple->emple_horario = 'L-J 9:00 a 6:00 / V 9:00 a 5:30';
            $perso->perso_nacionalidad = 'MEXICANA';
            $perso->perso_lugar_nacimiento = 'D.F.';

            $perso_id = '';
            return $this->render('add', [
                        'emple' => $emple,
                        'perso' => $perso,
                        'domic' => $domic
            ]);
        }
    }

    public function actionCapture() {
        /* pide un empleado */
        $model = new Empleados();
        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['empleados/capture1', 'perso_id' => $model->perso_id]);
//$this->actionCapture1($model->perso_id);
        }

        return $this->render('capture', [
                    'model' => $model,
        ]);
    }

    public function actionPass() {
        $model = Usuarios::find()->where(['usuar_id' => Yii::$app->user->identity->usuar_id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $resultado = ['guardado' => 'si'];
            return json_encode($resultado);
        }
    }

    public function actionExtmail() {
        
        $usuario = $_POST['Usuarios']['usuar_id'];
        $model = Usuarios::find()->where(['usuar_id' => $usuario])->one();
        $resultado = ['guardado' => 'no'];

        if ($model->load(Yii::$app->request->post())) {
            $resultado = ['guardado' => 'post'];
            if ($model->save())
                $resultado = ['guardado' => 'si'];
        }
        return json_encode($resultado);
       
    }

}
