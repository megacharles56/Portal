<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inventario */

$this->title = $model->inven_id;
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Inventario', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'inven_id',
            'artic_id',
            'inven_descripcion',
            'inven_caracteristica',
            'inven_color',
            'inven_material',
            'inven_marca',
            'inven_modelo',
            'inven_numero_serie',
            'inven_numero_inventario',
            'inven_colocacion',
            'inven_observaciones',
            'inven_estado',
            'inven_piso_id',
            'inven_emple_id',
            'inven_alta',
            'inven_actualizacion',
    ],
    ]) ?>

</div>
