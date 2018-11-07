<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vpermisos */

$this->title = $model->permi_id;
$this->params['breadcrumbs'][] = ['label' => 'Vpermisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vpermisos-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Vpermisos', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'permi_id',
            'usuar_id',
            'rol_nombre',
            'permi_clase',
            'metodo',
            'campo',
            'nivel',
    ],
    ]) ?>

</div>
