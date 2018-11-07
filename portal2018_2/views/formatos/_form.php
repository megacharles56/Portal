<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Formatos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formatos-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'forma_nombre'; 
$lista[] = 'forma_url'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
