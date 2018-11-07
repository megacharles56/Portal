<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VpermisolaboralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vpermisolaboral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'perla_id') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?= $form->field($model, 'perla_dia_inicial') ?>

    <?= $form->field($model, 'perla_hora_inicial') ?>

    <?= $form->field($model, 'perla_hora_final') ?>

    <?php // echo $form->field($model, 'perla_dia_final') ?>

    <?php // echo $form->field($model, 'perla_observaciones') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'asunto') ?>

    <?php // echo $form->field($model, 'solicitante') ?>

    <?php // echo $form->field($model, 'firmante1') ?>

    <?php // echo $form->field($model, 'firmante2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
