<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */

$this->title = $model->manto_id;
$this->params['breadcrumbs'][] = ['label' => 'Mantenimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mantenimiento-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Mantenimiento', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'manto_id',
            'manto_folio_s',
            'manto_folio_m',
            'manto_folio_e',
            'autor',
            'modificacion',
            'manto_falla',
            'manto_observaciones',
            'manto_f_solicitud',
            'manto_h_solicitud',
            'manto_responsable',
            'manto_inven_id',
            'manto_f_inicio',
            'manto_h_inicio',
            'manto_diagnostico',
            'manto_acciones',
            'manto_observaciones_m',
            'manto_f_entrega',
            'manto_h_entrega',
            'manto_f_recepcion',
            'manto_h_recepcion',
            'manto_califiacion',
            'manto_estado',
            'manto_tipo_manto',
            'manto_f_preferente',
            'manto_h_preferente',
    ],
    ]) ?>

</div>
