<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PpRelacionesExt */

$this->title = $model->prele_id;
$this->params['breadcrumbs'][] = ['label' => 'Pp Relaciones Exts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pp-relaciones-ext-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'PpRelacionesExt', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'prele_id',
            'autor',
            'modificacion',
            'perpu_id',
            'prele_relacion',
    ],
    ]) ?>

</div>
