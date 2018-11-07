<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpleadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'emple_id') ?>

    <?= $form->field($model, 'autor') ?>

    <?= $form->field($model, 'historia') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?= $form->field($model, 'estad_id') ?>

    <?php // echo $form->field($model, 'perso_id') ?>

    <?php // echo $form->field($model, 'emple_num_nomina') ?>

    <?php // echo $form->field($model, 'perpu_id') ?>

    <?php // echo $form->field($model, 'emple_horario') ?>

    <?php // echo $form->field($model, 'emple_jornada_laboral') ?>

    <?php // echo $form->field($model, 'emple_descanso_semanal') ?>

    <?php // echo $form->field($model, 'emple_lugar_trabajo') ?>

    <?php // echo $form->field($model, 'emple_terminacion_contrato') ?>

    <?php // echo $form->field($model, 'emple_jefe') ?>

    <?php // echo $form->field($model, 'emple_usuario') ?>

    <?php // echo $form->field($model, 'emple_clave_sistemas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
