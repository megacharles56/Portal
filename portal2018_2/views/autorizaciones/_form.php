<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Autorizaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autorizaciones-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'autor_autoriza'; 
$lista[] = 'modificacion'; 
$lista[] = 'perla_id'; 
$lista[] = 'autor_autorizacion'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
