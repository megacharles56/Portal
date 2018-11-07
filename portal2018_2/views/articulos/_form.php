<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Articulos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulos-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'artic_nombre'; 
$lista[] = 'tiart_id'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
