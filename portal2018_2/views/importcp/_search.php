<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ImportcpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="importcp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'impcp_id') ?>

    <?= $form->field($model, 'd_codigo') ?>

    <?= $form->field($model, 'd_asenta') ?>

    <?= $form->field($model, 'd_mnpio') ?>

    <?= $form->field($model, 'c_estado') ?>

    <?php // echo $form->field($model, 'c_tipo_asenta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
