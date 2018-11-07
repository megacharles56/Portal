<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Almacen */

$this->title = $model->almac_id;
$this->params['breadcrumbs'][] = ['label' => 'Almacens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="almacen-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Almacen', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'almac_id',
            'almac_producto',
            'almac_clave',
            'almac_seccion',
    ],
    ]) ?>

</div>
