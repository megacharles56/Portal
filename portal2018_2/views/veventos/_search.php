<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VeventosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="veventos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'event_id') ?>

    <?= $form->field($model, 'event_evento') ?>

    <?= $form->field($model, 'event_fecha') ?>

    <?= $form->field($model, 'event_inicio') ?>

    <?= $form->field($model, 'event_fin') ?>

    <?php // echo $form->field($model, 'event_pagado') ?>

    <?php // echo $form->field($model, 'estor_id') ?>

    <?php // echo $form->field($model, 'emple_id') ?>

    <?php // echo $form->field($model, 'salon_id') ?>

    <?php // echo $form->field($model, 'event_responsable') ?>

    <?php // echo $form->field($model, 'event_menu') ?>

    <?php // echo $form->field($model, 'event_pax') ?>

    <?php // echo $form->field($model, 'event_servicio') ?>

    <?php // echo $form->field($model, 'event_acomodo') ?>

    <?php // echo $form->field($model, 'event_estado') ?>

    <?php // echo $form->field($model, 'perso_nombre') ?>

    <?php // echo $form->field($model, 'estructura_organica_c') ?>

    <?php // echo $form->field($model, 'salon_nombre') ?>

    <?php // echo $form->field($model, 'servicio') ?>

    <?php // echo $form->field($model, 'acomodo') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
