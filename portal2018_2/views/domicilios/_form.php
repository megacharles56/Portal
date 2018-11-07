<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Domicilios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domicilios-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'domic_id'; 
$lista[] = 'domic_calle_numero'; 
$lista[] = 'domic_colonia'; 
$lista[] = 'import_id'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
