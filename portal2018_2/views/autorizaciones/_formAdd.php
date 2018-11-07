<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Autorizaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autorizaciones-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'autor_autoriza')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'modificacion')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'perla_id')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'autor_autorizacion')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
