<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MantenimientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mantenimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'manto_id') ?>

    <?= $form->field($model, 'manto_folio_s') ?>

    <?= $form->field($model, 'manto_folio_m') ?>

    <?= $form->field($model, 'manto_folio_e') ?>

    <?= $form->field($model, 'autor') ?>

    <?php // echo $form->field($model, 'modificacion') ?>

    <?php // echo $form->field($model, 'manto_falla') ?>

    <?php // echo $form->field($model, 'manto_observaciones') ?>

    <?php // echo $form->field($model, 'manto_f_solicitud') ?>

    <?php // echo $form->field($model, 'manto_h_solicitud') ?>

    <?php // echo $form->field($model, 'manto_responsable') ?>

    <?php // echo $form->field($model, 'manto_inven_id') ?>

    <?php // echo $form->field($model, 'manto_f_inicio') ?>

    <?php // echo $form->field($model, 'manto_h_inicio') ?>

    <?php // echo $form->field($model, 'manto_diagnostico') ?>

    <?php // echo $form->field($model, 'manto_acciones') ?>

    <?php // echo $form->field($model, 'manto_observaciones_m') ?>

    <?php // echo $form->field($model, 'manto_f_entrega') ?>

    <?php // echo $form->field($model, 'manto_h_entrega') ?>

    <?php // echo $form->field($model, 'manto_f_recepcion') ?>

    <?php // echo $form->field($model, 'manto_h_recepcion') ?>

    <?php // echo $form->field($model, 'manto_califiacion') ?>

    <?php // echo $form->field($model, 'manto_estado') ?>

    <?php // echo $form->field($model, 'manto_tipo_manto') ?>

    <?php // echo $form->field($model, 'manto_f_preferente') ?>

    <?php // echo $form->field($model, 'manto_h_preferente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
