<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TiposArticulo */

$this->title = $model->tiart_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipos Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-articulo-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'TiposArticulo', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'tiart_id',
            'tiart_nombre',
    ],
    ]) ?>

</div>
