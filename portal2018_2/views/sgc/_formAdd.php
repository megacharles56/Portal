<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sgc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sgc-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'autor')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'modificacion')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'sgc_documento')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'sgc_clave')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'sgc_revision')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'sgc_fecha')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'sgc_proceso')->textInput(); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
