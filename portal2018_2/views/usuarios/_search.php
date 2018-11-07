<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usuar_id') ?>

    <?= $form->field($model, 'usuar_usuario') ?>

    <?= $form->field($model, 'usuar_nombre') ?>

    <?= $form->field($model, 'usuar_clave') ?>

    <?= $form->field($model, 'usuar_correo_1') ?>

    <?php // echo $form->field($model, 'usuar_correo_2') ?>

    <?php // echo $form->field($model, 'usuar_tel_1') ?>

    <?php // echo $form->field($model, 'usuar_tel_2') ?>

    <?php // echo $form->field($model, 'usuar_ext_1') ?>

    <?php // echo $form->field($model, 'usuar_ext_2') ?>

    <?php // echo $form->field($model, 'usuar_relacion_id') ?>

    <?php // echo $form->field($model, 'usuar_relacion_nombre') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
