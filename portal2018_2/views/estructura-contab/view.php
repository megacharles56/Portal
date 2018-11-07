<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstructuraContab */

$this->title = $model->estco_id;
$this->params['breadcrumbs'][] = ['label' => 'Estructura Contabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estructura-contab-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'EstructuraContab', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'estco_id',
            'autor',
            'modificacion',
            'estad_id',
            'estco_nombre',
            'estco_numero',
    ],
    ]) ?>

</div>
