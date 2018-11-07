<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstructuraOrganica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estructura-organica-formBatch">

    <?php $form = ActiveForm::begin(); ?>

        <?php 
$form->field($model, $fieldMaster)->hiddenInput(["value"=> $idMaster])->label(false); 
 $col = $form->field($model, 'autor')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'modificacion')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estad_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estor_nombre')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estor_objetivo')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estor_tipo_estructura')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estco_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estor_superior')->textInput(); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model , 'prefi_id', $model->prefi_id, $model->isNewRecord);  
 ActiveForm::end(); ?>
</div>
