<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Variables */

$this->title = $model->varia_id;
$this->params['breadcrumbs'][] = ['label' => 'Variables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variables-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Variables', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'varia_id',
            'modificacion',
            'varia_tabla',
            'varia_campo',
            'varia_cadena',
            'varia_extra',
            'varia_info',
            'varia_numerico',
            'varia_fecha',
    ],
    ]) ?>

</div>
