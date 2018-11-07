<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Variables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="variables-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
//    $lista[] = 'varia_id'; 
// $lista[] = 'modificacion'; 
$lista[] = 'varia_tabla'; 
$lista[] = 'varia_campo'; 
$lista[] = 'varia_cadena'; 
$lista[] = 'varia_extra'; 
$lista[] = 'varia_info'; 
$lista[] = 'varia_numerico'; 
$lista[] = 'varia_fecha'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
