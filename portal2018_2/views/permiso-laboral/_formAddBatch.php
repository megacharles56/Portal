<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermisoLaboral */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permiso-laboral-formBatch">

    <?php $form = ActiveForm::begin(); ?>

        <?php 
$form->field($model, $fieldMaster)->hiddenInput(["value"=> $idMaster])->label(false); 
 $col = $form->field($model, 'autor')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'modificacion')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estad_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perla_dia_inicial')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perla_hora_inicial')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perla_hora_final')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perla_dia_final')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perla_asunto')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perla_observaciones')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model , 'prefi_id', $model->prefi_id, $model->isNewRecord);  
 ActiveForm::end(); ?>
</div>
