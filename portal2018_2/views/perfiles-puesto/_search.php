<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilesPuestoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfiles-puesto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'perpu_id') ?>

    <?= $form->field($model, 'reporta_a') ?>

    <?= $form->field($model, 'autor') ?>

    <?= $form->field($model, 'historia') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?php // echo $form->field($model, 'estad_id') ?>

    <?php // echo $form->field($model, 'perpu_nombre') ?>

    <?php // echo $form->field($model, 'perpu_complemento') ?>

    <?php // echo $form->field($model, 'estor_id') ?>

    <?php // echo $form->field($model, 'perpu_genero') ?>

    <?php // echo $form->field($model, 'perpu_estado_civil') ?>

    <?php // echo $form->field($model, 'perpu_edad_minima') ?>

    <?php // echo $form->field($model, 'perpu_edad_maxima') ?>

    <?php // echo $form->field($model, 'perpu_expe_interna') ?>

    <?php // echo $form->field($model, 'perpu_expe_externa') ?>

    <?php // echo $form->field($model, 'perpu_expe_especialidad') ?>

    <?php // echo $form->field($model, 'perpu_escolaridad') ?>

    <?php // echo $form->field($model, 'perpu_objetivo') ?>

    <?php // echo $form->field($model, 'perpu_nombre_completo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
