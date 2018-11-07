<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Variables;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursos-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();


    $lista[] = 'curso_nombre';
    $estados = Variables::findAll(['varia_tabla' => '*', 'varia_campo' => 'ESTADO']);
    $itemsEdo = ArrayHelper::map($estados, 'varia_id', 'varia_cadena');
    $lista[] = ['dropDownList', 'estad_id', $itemsEdo, 'seleccione estado'];
    
    $l = $form->field($model, 'curso_fecha_inicio')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'seleccione la fecha de inicio'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    $lista[] = ['raw', $l];
    

    $l = $form->field($model, 'curso_fecha_fin')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'seleccione la fecha de inicio'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    $lista[] = ['raw', $l];


    $lista[] = 'curso_duracion';
    $lista[] = 'curso_facilitador';
    $lista[] = 'curso_empresa';
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
