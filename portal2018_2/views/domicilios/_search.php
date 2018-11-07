<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DomiciliosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domicilios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'domic_id') ?>

    <?= $form->field($model, 'domic_calle_numero') ?>

    <?= $form->field($model, 'domic_colonia') ?>

    <?= $form->field($model, 'import_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
