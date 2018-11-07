<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PerpuFunciones */

$this->title = $model->pfunc_id;
$this->params['breadcrumbs'][] = ['label' => 'Perpu Funciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perpu-funciones-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'PerpuFunciones', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'pfunc_id',
            'autor',
            'modificacion',
            'perpu_id',
            'pfunc_funcion',
    ],
    ]) ?>

</div>
