<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Veventos */

$this->title = $model->event_id;
$this->params['breadcrumbs'][] = ['label' => 'Veventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veventos-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Veventos', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'event_id',
            'event_evento',
            'event_fecha',
            'event_inicio',
            'event_fin',
            'event_pagado',
            'estor_id',
            'emple_id',
            'salon_id',
            'event_responsable',
            'event_menu',
            'event_pax',
            'event_servicio',
            'event_acomodo',
            'event_estado',
            'perso_nombre',
            'estructura_organica_c',
            'salon_nombre',
            'servicio',
            'acomodo',
            'estado',
    ],
    ]) ?>

</div>
