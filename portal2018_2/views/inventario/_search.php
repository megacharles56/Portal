<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InventarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'inven_id') ?>

    <?= $form->field($model, 'artic_id') ?>

    <?= $form->field($model, 'inven_descripcion') ?>

    <?= $form->field($model, 'inven_caracteristica') ?>

    <?= $form->field($model, 'inven_color') ?>

    <?php // echo $form->field($model, 'inven_material') ?>

    <?php // echo $form->field($model, 'inven_marca') ?>

    <?php // echo $form->field($model, 'inven_modelo') ?>

    <?php // echo $form->field($model, 'inven_numero_serie') ?>

    <?php // echo $form->field($model, 'inven_numero_inventario') ?>

    <?php // echo $form->field($model, 'inven_colocacion') ?>

    <?php // echo $form->field($model, 'inven_observaciones') ?>

    <?php // echo $form->field($model, 'inven_estado') ?>

    <?php // echo $form->field($model, 'inven_piso_id') ?>

    <?php // echo $form->field($model, 'inven_emple_id') ?>

    <?php // echo $form->field($model, 'inven_alta') ?>

    <?php // echo $form->field($model, 'inven_actualizacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
