<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sgc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sgc-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'autor'; 
$lista[] = 'modificacion'; 
$lista[] = 'sgc_documento'; 
$lista[] = 'sgc_clave'; 
$lista[] = 'sgc_revision'; 
$lista[] = 'sgc_fecha'; 
$lista[] = 'sgc_proceso'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
