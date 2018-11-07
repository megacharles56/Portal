<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pisos */

$this->title = $model->piso_id;
$this->params['breadcrumbs'][] = ['label' => 'Pisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pisos-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Pisos', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'piso_id',
            'edifi_id',
            'piso_nombre',
    ],
    ]) ?>

</div>
