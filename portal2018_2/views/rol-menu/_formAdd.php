<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RolMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-menu-formAdd">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $col = $form->field($model, 'rol_id')->textInput();

    echo $this->twoCols($col, '');
    $col = $form->field($model, 'rolme_label')->textInput(['maxlength' => true]);

    echo $this->twoCols($col, '');
    $col = $form->field($model, 'rolme_url')->textInput(['maxlength' => true]);

    echo $this->twoCols($col, '');
    ?>    <?php $this->finishForm($model);
    ActiveForm::end();
    ?>
</div>
