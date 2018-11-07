<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermisoLaboralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permiso-laboral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'perla_id') ?>

    <?= $form->field($model, 'autor') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?= $form->field($model, 'estad_id') ?>

    <?= $form->field($model, 'perla_dia_inicial') ?>

    <?php // echo $form->field($model, 'perla_hora_inicial') ?>

    <?php // echo $form->field($model, 'perla_hora_final') ?>

    <?php // echo $form->field($model, 'perla_dia_final') ?>

    <?php // echo $form->field($model, 'perla_asunto') ?>

    <?php // echo $form->field($model, 'perla_observaciones') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
