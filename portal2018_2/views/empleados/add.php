<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Variables;
use yii\helpers\ArrayHelper;
use app\models\PerfilesPuesto;
use kartik\date\DatePicker;
use app\models\Vempleados;
use app\models\Usuarios;
use app\models\Personas;
use app\models\Empleados;


/* @var $this yii\web\View */
/* @var $model app\models\Empleados */


$direccioncolonias = '"' . Yii::$app->urlManager->createUrl('domicilios/jgetcolonias') . '"';
$PersonaDatos = '"' . Yii::$app->urlManager->createUrl('personas/jgetdata') . '"';
$this->registerJs(
        " 
    function cpChange( ) {
        var input = $('#domicilios-domic_cp');
        var form = $(input[0].form);
        d = form.serialize();
        jQuery.ajax(
                {'type': 'POST',
                    'url': $direccioncolonias,
                    'cache': false,
                    'data': d,
                    'success': function (json) {
                        resultado = $.parseJSON(json);
                        if (resultado['error'] == 'no')
                        {
                            jQuery('#selectColonia').html(resultado['s']);
                            $('#grpColonia').show();
                            $('#grpMunicipio').show();
                            $('#grpEstadoRepublica').show();
                            $('#valMunicipio').html(resultado['m']);
                            $('#valEstadoRepublica').html(resultado['edo']);
                            $('#domicilios-import_id').val(resultado['cpid']) ;
                        } else {
                            $('#lblColonia').hide();
                            $('#grpMunicipio').hide();
                            $('#grpEstadoRepublica').hide();
                            jQuery('#selectColonia').html(resultado['error']);
                        }
                    }
                }

        );
        return;
    }

 $('#domicilios-domic_cp').change(
    function(){ cpChange();}                
    )
    


 $('#empleados-perso_id').change(
    function(){ alert('hola');}                
    )

"
);





$this->title = 'Crear Empleados';

$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-add">

    <?php
    $lista = [];
    $form = ActiveForm::begin();

    $activo = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;

    $lista = [];
    $form = ActiveForm::begin();
    /*
      $elementos = Personas::find()->all();
      $items = [];
      foreach ($elementos as $el)
      {  $id =  $el->perso_id;
      if (( Empleados::find( )->where("perso_id = $id")->count() != 0))
      $items[$el->perso_id] = $el->perso_nombre;
      }
      echo $form->field($emple, 'perso_id')->dropDownList($items, ['prompt' => 'seleccione  a la persona']);
     */

    $lista[] = 'perso_nombre1';
//   $lista[] = 'perso_nombre2';
// $lista[] = 'perso_nombre3';
    $lista[] = 'perso_paterno';
    $lista[] = 'perso_materno';
    $lista[] = 'perso_titulo';
//    $lista[] = 'perso_sobrenombre';
    $lista[] = 'perso_rfc';
    $lista[] = 'perso_curp';
    $lista[] = 'perso_nacionalidad';
    $lista[] = 'perso_lugar_nacimiento';
    $elementos = Variables::findAll(['varia_tabla' => '*', 'varia_campo' => 'ESTADO CIVIL']);
    $items = ArrayHelper::map($elementos, 'varia_id', 'varia_cadena');
    $lista[] = ['dropDownList', 'perso_estado_civil', $items, 'Estado Civil'];    
    $lista[] = 'perso_email';
    $lista[] = 'perso_telefono';

    $l = $form->field($perso, 'perso_fecha_nacimiento')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'selccione la fecha...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    $lista[] = ['raw', $l];
    $items = ['HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'];

    $lista[] = ['dropDownList', 'perso_sexo', $items, 'seleccione'];
    $this->fThreecols($this, $form, $perso, $lista);
    echo '<hr>';

    /*     * ******************************************************************************* */
    $c1 = $form->field($domic, 'domic_calle_numero')->textInput(['maxlength' => true]);
    $this->twoCols($c1, ' ');
    ?>    
    <div class="row">
        <div class ="col-md-2 col-md-offset-1">
            <?= $form->field($domic, 'domic_cp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class ="col-md-3"  style="display: none"  id="grpColonia">
            <label class="control-label" 
                   id="lblColonia">colonia</label>
            <div id="selectColonia">
                <?php echo $form->field($domic, 'domic_colonia')->textInput(['maxlength' => true]); ?>
            </div>
        </div>

        <div class ="col-md-2"  id="grpMunicipio" style="display:none" >
            <label class="control-label">Municipio</label>
            <div id="valMunicipio"></div>
        </div>

        <div class ="col-md-2"   id="grpEstadoRepublica" style="display:none" > 
            <label class="control-label" >Estado</label>
            <div id="valEstadoRepublica"></div>
        </div>

        <div class ="col-md-2" style="display:none">
            <?= $form->field($domic, 'import_id')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <hr>
    <?php
    /*     * ******************************************************************************* */
    $lista = [];
    $lista[] = 'emple_nss';
    $lista[] = 'emple_num_nomina';
    $activo = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;
    $elementos = PerfilesPuesto::findAll(['estad_id' => $activo]);
    $items = ArrayHelper::map($elementos, 'perpu_id', ('perpu_nombre_completo'));
    $lista[] = ['dropDownList', 'perpu_id', $items, 'seleccione perfil'];
    $lista[] = 'emple_horario';
    $lista[] = 'emple_jornada_laboral';
    $lista[] = 'emple_descanso_semanal';
    //$lista[] = 'emple_lugar_trabajo';
    $l = $form->field($emple, 'emple_ingreso')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'selccione la fecha...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    $lista[] = ['raw', $l];


    $l = $form->field($emple, 'emple_terminacion_contrato')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'selccione la fecha...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    $lista[] = ['raw', $l];
    $elementos = Vempleados::findAll(['estad_id' => $activo]);
    $items = ArrayHelper::map($elementos, 'emple_id', ('perso_nombre'));
    $lista[] = ['dropDownList', 'emple_jefe', $items, 'seleccione al jefe']; $epers = $perso->errors;
                $eemple = $emple->errors;
                $edomic = $domic->errors;
    $lista[] = '';
    $lista[] = 'emple_usuario';
    $lista[] = ['password', 'emple_clave_sistemas'];
    $this->fThreecols($this, $form, $emple, $lista);

    $this->finishForm($emple);

    ActiveForm::end();
    ?>       


    <?php
    echo '<hr><h2>perso</h2>';
    print_r($perso->errors);
    echo '<hr><h2>emple</h2>';
    print_r($emple->errors);
    echo 'perso_id :' .$emple->perso_id.'<br>';
    echo 'perpu_id'. $emple->perpu_id.'<br>';
    print_r($emple->errors);    
    echo '<hr>';
    print_r($domic->errors);
    echo '<hr>';
    ?>
</div>




