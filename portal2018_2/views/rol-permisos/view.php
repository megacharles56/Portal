<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RolPermisos */

$this->title = $model->rolpe_id;
$this->params['breadcrumbs'][] = ['label' => 'Rol Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-permisos-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'RolPermisos', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'rolpe_id',
            'rolpe_rol_id',
            'rolpe_permi_id',
    ],
    ]) ?>

</div>
