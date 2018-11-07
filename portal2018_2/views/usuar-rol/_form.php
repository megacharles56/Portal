<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarRol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuar-rol-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'usuar_id'; 
$lista[] = 'rol_id'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
