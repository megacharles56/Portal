<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadosRepublica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estados-republica-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'esrep_id'; 
$lista[] = 'esrep_estado'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
