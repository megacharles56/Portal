<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vpermisos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vpermisos-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'usuar_id'; 
$lista[] = 'rol_nombre'; 
$lista[] = 'permi_clase'; 
$lista[] = 'metodo'; 
$lista[] = 'campo'; 
$lista[] = 'nivel'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
