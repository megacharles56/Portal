<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sgc */

$this->title = $model->sgc_id;
$this->params['breadcrumbs'][] = ['label' => 'Sgcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgc-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Sgc', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'sgc_id',
            'autor',
            'modificacion',
            'sgc_documento',
            'sgc_clave',
            'sgc_revision',
            'sgc_fecha',
            'sgc_proceso',
    ],
    ]) ?>

</div>
