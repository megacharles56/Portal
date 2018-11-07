<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Importcp */

$this->title = $model->impcp_id;
$this->params['breadcrumbs'][] = ['label' => 'Importcps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="importcp-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Importcp', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'impcp_id',
            'd_codigo',
            'd_asenta',
            'd_mnpio',
            'c_estado',
            'c_tipo_asenta',
    ],
    ]) ?>

</div>
