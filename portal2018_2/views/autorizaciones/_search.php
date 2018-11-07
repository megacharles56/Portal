<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AutorizacionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autorizaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'autor_id') ?>

    <?= $form->field($model, 'autor_autoriza') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?= $form->field($model, 'perla_id') ?>

    <?= $form->field($model, 'autor_autorizacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
