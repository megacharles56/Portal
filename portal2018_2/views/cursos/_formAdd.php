<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursos-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'estad_id')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'curso_nombre')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'curso_fecha_inicio')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'curso_fecha_fin')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'curso_duracion')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'curso_facilitador')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'curso_empresa')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
