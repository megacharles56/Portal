<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RolMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-menu-formBatch">

    <?php $form = ActiveForm::begin(); ?>

        <?php 
$form->field($model, $fieldMaster)->hiddenInput(["value"=> $idMaster])->label(false); 
 $col = $form->field($model, 'rol_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'rolme_label')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'rolme_url')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model , 'prefi_id', $model->prefi_id, $model->isNewRecord);  
 ActiveForm::end(); ?>
</div>
