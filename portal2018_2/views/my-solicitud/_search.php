<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MySolicitudSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="my-solicitud-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha_my_solicitud') ?>

    <?= $form->field($model, 'no_emp') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'dias') ?>

    <?php // echo $form->field($model, 'mes') ?>

    <?php // echo $form->field($model, 'mes2') ?>

    <?php // echo $form->field($model, 'hora') ?>

    <?php // echo $form->field($model, 'hora1') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'asunto') ?>

    <?php // echo $form->field($model, 'obs') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'autoriza') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
