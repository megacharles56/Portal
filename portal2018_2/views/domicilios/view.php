<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Domicilios */

$this->title = $model->domic_id;
$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="domicilios-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Domicilios', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'domic_id',
            'domic_calle_numero',
            'domic_colonia',
            'import_id',
    ],
    ]) ?>

</div>
