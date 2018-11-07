<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Personas;
use app\models\Vempleados;
use app\models\PerfilesPuesto;
use yii\helpers\ArrayHelper;
use app\models\Variables;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleados-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();
    $elementos = Personas::find()->all();
    $items = ArrayHelper::map($elementos, 'perso_id', 'perso_nombre');
    $lista[] = ['dropDownList', 'perso_id', $items, 'seleccione  a la persona'];

    $lista[] = 'emple_num_nomina';
    $activo = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;
    $elementos = PerfilesPuesto::findAll(['estad_id' => $activo]);
    $items = ArrayHelper::map($elementos, 'perpu_id', ('perpu_nombre_completo'));
    $lista[] = ['dropDownList', 'perpu_id', $items, 'seleccione perfil'];

    $lista[] = 'emple_horario';
    $lista[] = 'emple_jornada_laboral';
    $lista[] = 'emple_descanso_semanal';
 //   $lista[] = 'emple_lugar_trabajo';

    // Usage with model and Active Form (with no default initial value)
    $l = $form->field($model, 'emple_terminacion_contrato')->widget(DatePicker::classname(), [
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
    
    
    
    
 //   $lista[] = 'emple_jefe';
    $lista[] = 'emple_usuario';
    $lista[] = ['password', 'emple_clave_sistemas'];
    
    
    
    
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    

    ?>    

</div>
