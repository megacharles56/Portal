<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Variables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="variables-formBatch">

    <?php $form = ActiveForm::begin(); ?>

        <?php 
$form->field($model, $fieldMaster)->hiddenInput(["value"=> $idMaster])->label(false); 
 $col = $form->field($model, 'modificacion')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'varia_tabla')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'varia_campo')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'varia_cadena')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'varia_extra')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'varia_info')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'varia_numerico')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'varia_fecha')->textInput(); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model , 'prefi_id', $model->prefi_id, $model->isNewRecord);  
 ActiveForm::end(); ?>
</div>
