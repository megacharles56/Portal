<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contadorpagina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contadorpagina-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'conpa_cantidad'; 
$lista[] = 'conpa_pagina'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
