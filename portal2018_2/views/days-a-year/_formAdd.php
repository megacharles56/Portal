<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DaysAYear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="days-ayear-formAdd">

    <?php $form = ActiveForm::begin(); ?>

        <?php   $col = $form->field($model, 'dayea_year')->textInput(); 

 echo $this->twoCols($col, ''); 
  $col = $form->field($model, 'dayea_days')->textInput(); 

 echo $this->twoCols($col, ''); 
?>    <?php $this->finishForm($model );  
 ActiveForm::end(); ?>
</div>
