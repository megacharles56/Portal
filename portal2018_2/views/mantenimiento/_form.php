<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mantenimiento-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'manto_folio_s'; 
$lista[] = 'manto_folio_m'; 
$lista[] = 'manto_folio_e'; 
$lista[] = 'autor'; 
$lista[] = 'modificacion'; 
$lista[] = 'manto_falla'; 
$lista[] = 'manto_observaciones'; 
$lista[] = 'manto_f_solicitud'; 
$lista[] = 'manto_h_solicitud'; 
$lista[] = 'manto_responsable'; 
$lista[] = 'manto_inven_id'; 
$lista[] = 'manto_f_inicio'; 
$lista[] = 'manto_h_inicio'; 
$lista[] = 'manto_diagnostico'; 
$lista[] = 'manto_acciones'; 
$lista[] = 'manto_observaciones_m'; 
$lista[] = 'manto_f_entrega'; 
$lista[] = 'manto_h_entrega'; 
$lista[] = 'manto_f_recepcion'; 
$lista[] = 'manto_h_recepcion'; 
$lista[] = 'manto_califiacion'; 
$lista[] = 'manto_estado'; 
$lista[] = 'manto_tipo_manto'; 
$lista[] = 'manto_f_preferente'; 
$lista[] = 'manto_h_preferente'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
