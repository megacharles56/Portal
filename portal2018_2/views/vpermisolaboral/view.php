<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vpermisolaboral */

$this->title = $model->perla_id;
$this->params['breadcrumbs'][] = ['label' => 'Vpermisolaborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vpermisolaboral-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Vpermisolaboral', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'perla_id',
            'modificacion',
            'perla_dia_inicial',
            'perla_hora_inicial',
            'perla_hora_final',
            'perla_dia_final',
            'perla_observaciones',
            'estado',
            'asunto',
            'solicitante',
            'firmante1',
            'firmante2',
    ],
    ]) ?>

</div>
