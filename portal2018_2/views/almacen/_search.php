<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlmacenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="almacen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'almac_id') ?>

    <?= $form->field($model, 'almac_producto') ?>

    <?= $form->field($model, 'almac_clave') ?>

    <?= $form->field($model, 'almac_seccion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
