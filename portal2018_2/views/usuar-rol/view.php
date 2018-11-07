<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarRol */

$this->title = $model->usrol_id;
$this->params['breadcrumbs'][] = ['label' => 'Usuar Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuar-rol-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'UsuarRol', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'usrol_id',
            'usrol_usuar_id',
            'usrol_rol_id',
    ],
    ]) ?>

</div>
