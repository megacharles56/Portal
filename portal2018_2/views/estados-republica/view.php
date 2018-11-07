<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstadosRepublica */

$this->title = $model->esrep_id;
$this->params['breadcrumbs'][] = ['label' => 'Estados Republicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estados-republica-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'EstadosRepublica', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'esrep_id',
            'esrep_estado',
    ],
    ]) ?>

</div>
