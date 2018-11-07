<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArchivosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'archi_id') ?>

    <?= $form->field($model, 'autor') ?>

    <?= $form->field($model, 'emple_id') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?= $form->field($model, 'archi_archivo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
