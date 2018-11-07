<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contadorpagina */

$this->title = $model->conpa_id;
$this->params['breadcrumbs'][] = ['label' => 'Contadorpaginas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contadorpagina-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Contadorpagina', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'conpa_id',
            'conpa_cantidad',
            'conpa_pagina',
    ],
    ]) ?>

</div>
