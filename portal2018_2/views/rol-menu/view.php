<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RolMenu */

$this->title = $model->rolme_id;
$this->params['breadcrumbs'][] = ['label' => 'Rol Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-menu-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'RolMenu', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'rolme_id',
            'rol_id',
            'rolme_label',
            'rolme_url:url',
    ],
    ]) ?>

</div>
