<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TiposAsentamiento */

$this->title = $model->tasen_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipos Asentamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-asentamiento-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'TiposAsentamiento', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'tasen_id',
            'tasen_nombre',
    ],
    ]) ?>

</div>
