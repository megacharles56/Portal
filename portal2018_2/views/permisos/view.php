<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Permisos */

$this->title = $model->permi_id;
$this->params['breadcrumbs'][] = ['label' => 'Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permisos-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Permisos', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'permi_id',
            'permi_metodo',
            'permi_campo',
            'clase_id',
            'permi_nivel',
    ],
    ]) ?>

</div>
