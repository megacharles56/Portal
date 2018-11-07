<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Importcp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="importcp-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'impcp_id'; 
$lista[] = 'd_codigo'; 
$lista[] = 'd_asenta'; 
$lista[] = 'd_mnpio'; 
$lista[] = 'c_estado'; 
$lista[] = 'c_tipo_asenta'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
