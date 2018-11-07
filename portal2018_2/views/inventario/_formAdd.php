<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inventario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventario-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'artic_id')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_descripcion')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_caracteristica')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_color')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_material')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_marca')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_modelo')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_numero_serie')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_numero_inventario')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_colocacion')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_observaciones')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_estado')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_piso_id')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_emple_id')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_alta')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'inven_actualizacion')->textInput(); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
