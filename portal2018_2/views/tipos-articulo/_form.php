<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TiposArticulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipos-articulo-form half-scr">
    <?php
    $form = ActiveForm::begin();

    echo $form->field($model, 'tiart_nombre')->textInput(['maxlength' => true]);
    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
