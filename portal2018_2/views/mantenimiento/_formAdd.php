<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mantenimiento-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'manto_folio_s')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_folio_m')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_folio_e')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'autor')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'modificacion')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_falla')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_observaciones')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_f_solicitud')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_h_solicitud')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_responsable')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_inven_id')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_f_inicio')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_h_inicio')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_diagnostico')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_acciones')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_observaciones_m')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_f_entrega')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_h_entrega')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_f_recepcion')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_h_recepcion')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_califiacion')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_estado')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_tipo_manto')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_f_preferente')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'manto_h_preferente')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
