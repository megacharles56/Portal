<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PpRelacionesExt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pp-relaciones-ext-formAdd">
    <?php
    $lista = [];
    $form = ActiveForm::begin([
                'options' => [
                    'style' => 'width:80%;  margin: inherit auto'
                ]
                    ]
    );
    echo $form->field($model, 'perpu_id')->hiddenInput()->label(false);
    echo $form->field($model, 'prele_relacion')->textInput(['maxlength' => true]);
    $this->fTwocols($this, $form, $model, $lista);
    $this->finishForm($model);
    ActiveForm::end();
    ?>
</div>
