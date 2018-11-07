<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Veventos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="veventos-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'event_evento'; 
$lista[] = 'event_fecha'; 
$lista[] = 'event_inicio'; 
$lista[] = 'event_fin'; 
$lista[] = 'event_pagado'; 
$lista[] = 'estor_id'; 
$lista[] = 'emple_id'; 
$lista[] = 'salon_id'; 
$lista[] = 'event_responsable'; 
$lista[] = 'event_menu'; 
$lista[] = 'event_pax'; 
$lista[] = 'event_servicio'; 
$lista[] = 'event_acomodo'; 
$lista[] = 'event_estado'; 
$lista[] = 'perso_nombre'; 
$lista[] = 'estructura_organica_c'; 
$lista[] = 'salon_nombre'; 
$lista[] = 'servicio'; 
$lista[] = 'acomodo'; 
$lista[] = 'estado'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
