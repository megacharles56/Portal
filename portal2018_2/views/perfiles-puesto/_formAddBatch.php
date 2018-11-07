<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilesPuesto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfiles-puesto-formBatch">

    <?php $form = ActiveForm::begin(); ?>

        <?php 
$form->field($model, $fieldMaster)->hiddenInput(["value"=> $idMaster])->label(false); 
 $col = $form->field($model, 'reporta_a')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'autor')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'historia')->textarea(['rows' => 6]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'modificacion')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estad_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_nombre')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_complemento')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'estor_id')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_genero')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_estado_civil')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_edad_minima')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_edad_maxima')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_expe_interna')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_expe_externa')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_expe_especialidad')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_escolaridad')->textInput(); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_objetivo')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
 
 $col = $form->field($model, 'perpu_nombre_completo')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model , 'prefi_id', $model->prefi_id, $model->isNewRecord);  
 ActiveForm::end(); ?>
</div>
