<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vpermisolaboral */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vpermisolaboral-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'modificacion'; 
$lista[] = 'perla_dia_inicial'; 
$lista[] = 'perla_hora_inicial'; 
$lista[] = 'perla_hora_final'; 
$lista[] = 'perla_dia_final'; 
$lista[] = 'perla_observaciones'; 
$lista[] = 'estado'; 
$lista[] = 'asunto'; 
$lista[] = 'solicitante'; 
$lista[] = 'firmante1'; 
$lista[] = 'firmante2'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
