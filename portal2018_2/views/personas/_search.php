<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'perso_id') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?= $form->field($model, 'estad_id') ?>

    <?= $form->field($model, 'autor') ?>

    <?= $form->field($model, 'historia') ?>

    <?php // echo $form->field($model, 'perso_nombre1') ?>

    <?php // echo $form->field($model, 'perso_nombre2') ?>

    <?php // echo $form->field($model, 'perso_nombre3') ?>

    <?php // echo $form->field($model, 'perso_paterno') ?>

    <?php // echo $form->field($model, 'perso_materno') ?>

    <?php // echo $form->field($model, 'perso_titulo') ?>

    <?php // echo $form->field($model, 'perso_sobrenombre') ?>

    <?php // echo $form->field($model, 'perso_rfc') ?>

    <?php // echo $form->field($model, 'perso_curp') ?>

    <?php // echo $form->field($model, 'perso_nombre') ?>

    <?php // echo $form->field($model, 'perso_nacionalidad') ?>

    <?php // echo $form->field($model, 'perso_fecha_nacimiento') ?>

    <?php // echo $form->field($model, 'perso_sexo') ?>

    <?php // echo $form->field($model, 'domic_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
