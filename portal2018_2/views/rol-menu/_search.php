<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RolMenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rolme_id') ?>

    <?= $form->field($model, 'rol_id') ?>

    <?= $form->field($model, 'rolme_label') ?>

    <?= $form->field($model, 'rolme_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
