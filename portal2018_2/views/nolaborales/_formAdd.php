<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Nolaborales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nolaborales-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'nolab_dia')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'nolab_motivo')->textInput(['maxlength' => true]); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
