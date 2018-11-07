<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RolPermisos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-permisos-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'rolpe_rol_id')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'rolpe_permi_id')->textInput(); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
