<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VariablesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="variables-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'varia_id') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?= $form->field($model, 'varia_tabla') ?>

    <?= $form->field($model, 'varia_campo') ?>

    <?= $form->field($model, 'varia_cadena') ?>

    <?php // echo $form->field($model, 'varia_extra') ?>

    <?php // echo $form->field($model, 'varia_info') ?>

    <?php // echo $form->field($model, 'varia_numerico') ?>

    <?php // echo $form->field($model, 'varia_fecha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
