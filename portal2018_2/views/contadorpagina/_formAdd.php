<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contadorpagina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contadorpagina-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'conpa_cantidad')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'conpa_pagina')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
