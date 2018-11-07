<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MySolicitud */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'My Solicituds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-solicitud-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'MySolicitud', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'id',
            'fecha_my_solicitud',
            'no_emp',
            'nombre',
            'dias',
            'mes',
            'mes2',
            'hora',
            'hora1',
            'total',
            'asunto',
            'obs',
            'direccion',
            'autoriza',
            'status',
    ],
    ]) ?>

</div>
