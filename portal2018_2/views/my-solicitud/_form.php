<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MySolicitud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="my-solicitud-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'fecha_my_solicitud'; 
$lista[] = 'no_emp'; 
$lista[] = 'nombre'; 
$lista[] = 'dias'; 
$lista[] = 'mes'; 
$lista[] = 'mes2'; 
$lista[] = 'hora'; 
$lista[] = 'hora1'; 
$lista[] = 'total'; 
$lista[] = 'asunto'; 
$lista[] = 'obs'; 
$lista[] = 'direccion'; 
$lista[] = 'autoriza'; 
$lista[] = 'status'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
