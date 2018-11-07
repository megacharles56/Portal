<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstructuraOrganicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estructura-organica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'estor_id') ?>

    <?= $form->field($model, 'autor') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?= $form->field($model, 'estad_id') ?>

    <?= $form->field($model, 'estor_nombre') ?>

    <?php // echo $form->field($model, 'estor_objetivo') ?>

    <?php // echo $form->field($model, 'estor_tipo_estructura') ?>

    <?php // echo $form->field($model, 'estco_id') ?>

    <?php // echo $form->field($model, 'estor_superior') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
