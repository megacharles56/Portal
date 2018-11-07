<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SgcSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sgc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sgc_id') ?>

    <?= $form->field($model, 'autor') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?= $form->field($model, 'sgc_documento') ?>

    <?= $form->field($model, 'sgc_clave') ?>

    <?php // echo $form->field($model, 'sgc_revision') ?>

    <?php // echo $form->field($model, 'sgc_fecha') ?>

    <?php // echo $form->field($model, 'sgc_proceso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
