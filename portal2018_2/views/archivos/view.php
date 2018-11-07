<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Archivos */

$this->title = $model->archi_id;
$this->params['breadcrumbs'][] = ['label' => 'Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archivos-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Archivos', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'archi_id',
            'autor',
            'emple_id',
            'modificacion',
            'archi_archivo',
    ],
    ]) ?>

</div>
