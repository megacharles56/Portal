<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Eventos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eventos-formBatch">

    <?php $form = ActiveForm::begin(); ?>

        <?php 
$form->field($model, $fieldMaster)->hiddenInput(["value"=> $idMaster])->label(false); 
 $col = $form->field($model, 'event_evento')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'event_fecha')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'event_inicio')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'event_fin')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'event_pagado')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estor_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'emple_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'salon_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'event_responsable')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'event_menu')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'event_pax')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'event_servicio')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'event_acomodo')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'event_estado')->textInput(); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model , 'prefi_id', $model->prefi_id, $model->isNewRecord);  
 ActiveForm::end(); ?>
</div>
