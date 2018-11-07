<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermisosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permisos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'permi_id') ?>

    <?= $form->field($model, 'permi_metodo') ?>

    <?= $form->field($model, 'permi_campo') ?>

    <?= $form->field($model, 'clase_id') ?>

    <?= $form->field($model, 'permi_nivel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
