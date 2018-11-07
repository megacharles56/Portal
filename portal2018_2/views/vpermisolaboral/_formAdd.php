<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vpermisolaboral */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vpermisolaboral-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'perla_id')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'modificacion')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'perla_dia_inicial')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'perla_hora_inicial')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'perla_hora_final')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'perla_dia_final')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'perla_observaciones')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'estado')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'asunto')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'solicitante')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'firmante1')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'firmante2')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
