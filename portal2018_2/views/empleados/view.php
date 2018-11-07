<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\Vempleados;
use app\models\UsuarRol;
use app\models\UsuarRolSearch;
use app\models\Usuarios;
use app\models\Personas;
use yii\grid\GridView;
use app\models\Empleados;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */

$this->title = $model->emple_num_nomina;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-view">
    <?php
    $m = Vempleados::find()->where(['emple_id' => $model->emple_id])->one();
    /*
      perso_nombre           emple_num_nomina
     * estado          nombre_autor                     modificacion
      historia
      perpu_nombre_completo   estor_nombre_completo

      emple_horario       emple_jornada_laboral          emple_descanso_semanal
      emple_lugar_trabajo   emple_terminacion_contrato
      emple_usuario
      perso_rfc  perso_curp  perso_nacionalidad
      perso_fecha_nacimiento         perso_sexo             iniciales
      jfenombre   estor_sup_nombre_completo
     */

    $gb = 'index';
    $u = Yii::$app->user->identity->usuar_id;
    $usr = Usuarios::findOne($u);
    foreach ($usr->usuarRols as $rol) {
        if ($rol->rol->rol_nombre = 'rh admin')
            $gb = 'admin';
    }
    
    if (!Yii::$app->user->isGuest)
        $this->HeaderView($model, $this->title, 'Empleado N.N.', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model), $gb);

    echo DetailView::widget([
        'model' => $m, 'condensed' => true, 'hover' => true,
        'mode' => DetailView::MODE_VIEW, 'buttons1' => '',
        'panel' => [
            'heading' => 'Perfil de puesto <span style="color: blue">' . $m->perso_nombre .
            ' </span>   <span style="color: darkblue"> Nómina: ' . $m->emple_num_nomina . '</span>',
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
            ['columns' => [
                    ['attribute' => 'estado',
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    ['attribute' => 'nombre_autor',
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    ['attribute' => 'modificacion',
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                ],
            ],
            /*
              'historia',
              ['columns' => [
              ['attribute' => 'perpu_nombre_completo',
              'labelColOptions' => ['style' => 'width:10%'],
              ],
              ['attribute' => 'estor_nombre_completo',
              'labelColOptions' => ['style' => 'width:10%'],
              ],
              ],
              ],

             */
            ['columns' => [
                    ['attribute' => 'emple_horario',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:20%'],
                    ],
                    ['attribute' => 'emple_jornada_laboral',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:20%'],
                    ],
                    ['attribute' => 'emple_descanso_semanal',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:20%'],
                    ],
                ],
            ],
            ['columns' => [
                    ['attribute' => 'emple_terminacion_contrato',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:50%'],
                    ],
                ],
            ],
            ['columns' => [
                    ['attribute' => 'emple_usuario',
                        'labelColOptions' => ['style' => 'width:8%'],
                        'valueColOptions' => ['style' => 'width:20%'],
                    ],
                    ['attribute' => 'perso_rfc',
                        'labelColOptions' => ['style' => 'width:8%'],
                        'valueColOptions' => ['style' => 'width:20%'],
                    ],
                    ['attribute' => 'perso_curp',
                        'labelColOptions' => ['style' => 'width:8%'],
                        'valueColOptions' => ['style' => 'width:18%'],
                    ],
                    ['attribute' => 'emple_nss',
                        'labelColOptions' => ['style' => 'width:8%'],
                        'valueColOptions' => ['style' => 'width:18%'],
                    ],
                ],
            ],
            ['columns' => [
                    ['attribute' => 'perso_nacionalidad',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    ['attribute' => 'perso_fecha_nacimiento',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    ['attribute' => 'perso_sexo',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    ['attribute' => 'iniciales',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],
            ['columns' => [
                    ['attribute' => 'jfenombre',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:40%'],
                    ],
                    ['attribute' => 'estor_sup_nombre_completo',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:40%'],
                    ],
                ],
            ],
            ['columns' => [
                    ['attribute' => 'emple_ingreso',
                        'labelColOptions' => ['style' => 'width:8%'],
                        'valueColOptions' => ['style' => 'width:22%'],
                    ],
                    ['attribute' => 'emple_antiguedad',
                        'labelColOptions' => ['style' => 'width:8%'],
                        'valueColOptions' => ['style' => 'width:22%'],
                    ],
                    ['attribute' => 'emple_cantidad_dias',
                        'labelColOptions' => ['style' => 'width:8%'],
                        'valueColOptions' => ['style' => 'width:22%'],
                    ],
                ],
            ],
        ]
    ]);
    $style = '100px; margin-bottom: 10px';
    $searchModel = new empleados();
    $siguiente = Empleados::find()->where(['>', 'emple_num_nomina', $model->emple_num_nomina])->orderBy('emple_num_nomina')->one();
    $anterior = Empleados::find()->where(['<', 'emple_num_nomina', $model->emple_num_nomina])->orderBy('emple_num_nomina desc')->one();
    $usr = Usuarios::find()->where(['usuar_relacion_id' => $model->emple_id])->one();

    
    //$e = Empleados::find()->where(['emple_id'=>  $this->usuar_relacion_id])->one();    

    $per = Personas::find()->where(['perso_id'=>$model->perso_id])->one();

    ?>




    <div class="gridDosCols40">
        <div class = "autorizaciones-form" style="border: black solid 2px; border-radius: 10px; padding: 5px 10px;">
            <div class='row'>
                <div class='col-sm-4 col-sm-offset-1'>
                    <div class="form-group field-usuarios-usuar_correo_1 required">
                        <label class="control-label" for="usuarios-usuar_correo_1">Correo 1</label>
                        
                        <input type="text" id="usuarios-usuar_correo_1" class="form-control" name="Usuarios[usuar_correo_1]" 
                               value="<?php echo $usr->usuar_correo_1 ?>" maxlength="48" aria-required="true">
                        
                        <!--<input type="text" id="usuarios-perso_email" class="form-control" name="Personas[perso_email]" 
                               value="<?php #echo $per->perso_email ?>" maxlength="48" aria-required="true">-->

                        <input id="usuarios-usuar_id" class="form-control" name="Usuarios[usuar_id]" 
                               value="<?php echo $usr->usuar_id ?>" type="hidden">


                        <div class="help-block"></div>
                    </div>
                </div>
                <div class='col-sm-4 col-sm-offset-2'>
                    <div class="form-group field-usuarios-usuar_ext_1">
                        <label class="control-label" for="usuarios-usuar_ext_1">Ext 1</label>
                        <input type="text" id="usuarios-usuar_ext_1" class="form-control" 
                               name="Usuarios[usuar_ext_1]"  value="<?php echo $usr->usuar_ext_1; ?>"  maxlength="12">

                        <div class="help-block"></div>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-sm-4 col-sm-offset-1'>

                </div>
                <div class='col-sm-4 col-sm-offset-2'>
                    <button type='submit' class='btn btn-success' style= 'width : 190px' id= 'btnModificaCorreoExt'>
                        Modificar correo/extensión
                    </button>
                </div>
            </div>
            <?php
            /*
              $usr = Usuarios::find()->where(['usuar_relacion_id' => $model->emple_id])->one();
              $lista = [];
              $form = ActiveForm::begin(['action'=> null  ]);
              $lista[] = 'usuar_correo_1';
              $lista[] = 'usuar_ext_1';
              $lista[] = '';
              $lista[] = ['raw', "

              <button type='submit' class='btn btn-success' style= 'width : 100%' id= 'btnModifica'>
              Modificar correo/extensión
              </button>"];
              $this->fTwocols($this, $form, $usr, $lista);

              ActiveForm::end();
             */
            ?>    

        </div>
        <div>
            <?php
            $usr = Usuarios::find()->where(['usuar_relacion_id' => $model->emple_id])->one();

            $searchModel = new UsuarRolSearch();
            $dataProvider = $searchModel->search(NULL);

            $dataProvider->query->andWhere(['usuar_id' => $usr->usuar_id]);

            /* @todo revisar alcance... */
            /* @todo revisar x k salen dos renglones? */
            $cols = [['class' => 'yii\grid\SerialColumn'], 'rol.rol_nombre'];
            $template = '';
            echo 'Roles';
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $cols
            ]);
            ?>
        </div>
        <div>
            <?php
            if ($anterior) {
                $btn = Html::a('Anterior [' . $anterior->perso->perso_nombre . ']', ['view', 'id' => $anterior->emple_id], ['class' => "btn btn-success ", 'style' => $style]);
                echo $btn;
            }
            ?>
        </div>
        <div>
            <?php
            if ($siguiente) {
                $btn = Html::a('Siguiente  [' . $siguiente->perso->perso_nombre . ']', ['view', 'id' => $siguiente->emple_id], ['class' => "btn btn-success ", 'style' => $style]);
                echo $btn;
            }
            ?>
        </div>

    </div>
