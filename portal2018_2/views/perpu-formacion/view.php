<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PerpuFormacion */

$this->title = $model->pform_id;
$this->params['breadcrumbs'][] = ['label' => 'Perpu Formacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perpu-formacion-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'PerpuFormacion', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
            'pform_id',
            'autor',
            'modificacion',
            'perpu_id',
            'pform_curso',
    ],
    ]) ?>

</div>
