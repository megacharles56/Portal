<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SalonesLigados */

$this->title = $model->salig_id;
$this->params['breadcrumbs'][] = ['label' => 'Salones Ligados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salones-ligados-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'SalonesLigados', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'salig_id',
            'salon_id',
    ],
    ]) ?>

</div>
