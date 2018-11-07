<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerpuFunciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perpu-funciones-formAdd">
    <?php
    $lista = [];
    $form = ActiveForm::begin([
                'options' => [
                    'style' => 'width:80%;  margin: inherit auto'
                ]
                    ]
    );
    echo $form->field($model, 'perpu_id')->hiddenInput()->label(false);
    echo $form->field($model, 'pfunc_funcion')->textInput(['maxlength' => true]);
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    ?>
</div>
