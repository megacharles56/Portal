<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TiposAsentamiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipos-asentamiento-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'tasen_id'; 
$lista[] = 'tasen_nombre'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
