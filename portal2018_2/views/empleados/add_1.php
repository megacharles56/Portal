<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Variables;
use yii\helpers\ArrayHelper;
use app\models\PerfilesPuesto;
use kartik\date\DatePicker;
use app\models\Vempleados;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */

$this->title = 'Crear Empleados';

$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-add">

    <?php
    $lista = [];
    $form = ActiveForm::begin();
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

    echo $form->field($domic, 'domic_calle_numero')->textInput(['maxlength' => true]);
    echo $form->field($domic, 'impor_id')->textInput(['maxlength' => true]);
    echo $form->field($domic, 'domic_colonia')->textInput(['maxlength' => true]);

    echo '<hr>';
    $lista = [];
    $lista[] = 'emple_num_nomina';
    $activo = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;
    $elementos = PerfilesPuesto::findAll(['estad_id' => $activo]);
    $items = ArrayHelper::map($elementos, 'perpu_id', ('perpu_nombre_completo'));
    $lista[] = ['dropDownList', 'perpu_id', $items, 'seleccione perfil'];

    $lista[] = 'emple_horario';
    $lista[] = 'emple_jornada_laboral';
    $lista[] = 'emple_descanso_semanal';
    //$lista[] = 'emple_lugar_trabajo';

    // Usage with model and Active Form (with no default initial value)
    $l = $form->field($emple, 'emple_terminacion_contrato')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'selccione la fecha...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    $lista[] = ['raw', $l];

    //@todo  agregar condiciones : activo 
    // mismo direccion y hacia arriba
    $elementos = Vempleados::findAll(['estad_id' => $activo]);
    $items = ArrayHelper::map($elementos, 'emple_id', ('perso_nombre'));
    $lista[] = ['dropDownList', 'emple_jefe', $items, 'seleccione al jefe'];

    $lista[] = '';
    $lista[] = 'emple_usuario';
    $lista[] = ['password', 'emple_clave_sistemas'];


    $this->fThreecols($this, $form, $emple, $lista);



    $this->finishForm($emple);

    ActiveForm::end();
    ?>       


</div>

</div>





