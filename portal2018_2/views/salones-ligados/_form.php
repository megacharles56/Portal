<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalonesLigados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salones-ligados-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'salon_id'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
