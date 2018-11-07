<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CursosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'curso_id') ?>

    <?= $form->field($model, 'estad_id') ?>

    <?= $form->field($model, 'curso_nombre') ?>

    <?= $form->field($model, 'curso_fecha_inicio') ?>

    <?= $form->field($model, 'curso_fecha_fin') ?>

    <?php // echo $form->field($model, 'curso_duracion') ?>

    <?php // echo $form->field($model, 'curso_facilitador') ?>

    <?php // echo $form->field($model, 'curso_empresa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
