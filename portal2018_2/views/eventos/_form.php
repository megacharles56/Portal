<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use kartik\date\DatePicker;
use app\models\Variables;
use app\models\VestructuraOrganica;
use app\models\Vempleados;
use app\models\Salones;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use app\models\Eventos;

/* @var $this yii\web\View */
/* @var $model app\models\Eventos */
/* @var $form yii\widgets\ActiveForm */

$activo = Variables::findOne(['varia_tabla' => '*', 'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;
$form = ActiveForm::begin();
?>

<div class="eventos-form">
    <div class='row'>
        <div class='col-sm-8 col-sm-offset-1'>
            <?php
            $data1 = Eventos::find()->select(['event_evento'])->all();
            $data = Array();
            foreach ($data1 as $d)
                $data[] = $d['event_evento'];

            $col1 = $form->field($model, 'event_evento')->widget(TypeaheadBasic::classname(), [
                'data' => $data,
                'options' => ['placeholder' => '...'],
                'pluginOptions' => ['highlight' => true],
            ]);
            echo $col1;
            ?>
        </div>
    </div>    
    <?php
    $lista = [];
    $col1 = $form->field($model, 'event_fecha')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'El dia...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    $lista[] = ['raw', $col1];
    $col1 = $form->field($model, 'event_inicio')->widget(TimePicker::classname(), ['pluginOptions' => ['showMeridian' => false]]);
    $lista[] = ['raw', $col1];
    $col1 = $form->field($model, 'event_fin')->widget(TimePicker::classname(), ['pluginOptions' => ['showMeridian' => false]]);
    $lista[] = ['raw', $col1];
    $items = ['SI' => 'SI', 'NO' => 'NO'];
    $lista[] = ['dropDownList', 'event_pagado', $items, 'seleccione '];
    $eo = VestructuraOrganica::find()->where("estad_id = $activo")->all();

    $items = ArrayHelper::map($eo, 'estor_id', 'estor_nombre_completo');
    $lista[] = ['dropDownList', 'estor_id', $items, 'seleccione '];

    $em = Vempleados::find()->where("estad_id = $activo")->all();
    $items = ArrayHelper::map($em, 'emple_id', 'perso_nombre');
    $lista[] = ['dropDownList', 'emple_id', $items, 'seleccione '];

    $lista[] = 'event_responsable';

    $sa = Salones::find()->all();
    $items = ArrayHelper::map($sa, 'salon_id', 'salon_nombre');
    $lista[] = ['dropDownList', 'salon_id', $items, 'seleccione '];

    $lista[] = ['textArea', 'event_menu'];
    $lista[] = ['number', 'event_pax'];

    $se = Variables::find()->where(['varia_tabla' => 'EVENTOS', 'varia_campo' => 'SERVICIO'])->all();
    $items = ArrayHelper::map($se, 'varia_id', 'varia_cadena');
    $lista[] = ['dropDownList', 'event_servicio', $items, 'seleccione '];

    $se = Variables::find()->where(['varia_tabla' => 'EVENTOS', 'varia_campo' => 'ACOMODO'])->all();
    $items = ArrayHelper::map($se, 'varia_id', 'varia_cadena');
    $lista[] = ['dropDownList', 'event_acomodo', $items, 'seleccione '];

    $es = Variables::find()->where(['varia_tabla' => 'EVENTOS', 'varia_campo' => 'ESTADO'])->all();
    $items = ArrayHelper::map($es, 'varia_id', 'varia_cadena');
    $lista[] = ['dropDownList', 'estad_id', $items, 'seleccione '];

    $this->fTwocols($this, $form, $model, $lista);
    ?>
    <div class='row'>
        <div class='col-sm-8 col-sm-offset-1'>
            <?= $form->field($model, 'event_observaciones')->textArea(); ?>
        </div>


    </div>

    <?php
    $this->finishForm($model);
    ActiveForm::end();
    ?>
</div>