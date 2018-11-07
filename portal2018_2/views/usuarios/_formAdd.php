<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'usuar_usuario')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'usuar_nombre')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'usuar_clave')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'usuar_correo_1')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'usuar_correo_2')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'usuar_tel_1')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'usuar_tel_2')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'usuar_ext_1')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'usuar_ext_2')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'usuar_relacion_id')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'usuar_relacion_nombre')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
