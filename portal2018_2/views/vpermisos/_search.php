<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VpermisosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vpermisos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'permi_id') ?>

    <?= $form->field($model, 'usuar_id') ?>

    <?= $form->field($model, 'rol_nombre') ?>

    <?= $form->field($model, 'permi_clase') ?>

    <?= $form->field($model, 'metodo') ?>

    <?php // echo $form->field($model, 'campo') ?>

    <?php // echo $form->field($model, 'nivel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
