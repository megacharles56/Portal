<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleados-formBatch">

    <?php $form = ActiveForm::begin(); ?>

        <?php 
$form->field($model, $fieldMaster)->hiddenInput(["value"=> $idMaster])->label(false); 
 $col = $form->field($model, 'autor')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'historia')->textarea(['rows' => 6]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'modificacion')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estad_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perso_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'emple_num_nomina')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'emple_horario')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'emple_jornada_laboral')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'emple_descanso_semanal')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
// $col = $form->field($model, 'emple_lugar_trabajo')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'emple_terminacion_contrato')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'emple_jefe')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'emple_usuario')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'emple_clave_sistemas')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model , 'prefi_id', $model->prefi_id, $model->isNewRecord);  
 ActiveForm::end(); ?>
</div>
