<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */

$this->title = $model->curso_id;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Cursos', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'curso_id',
            'estad_id',
            'curso_nombre',
            'curso_fecha_inicio',
            'curso_fecha_fin',
            'curso_duracion',
            'curso_facilitador',
            'curso_empresa',
    ],
    ]) ?>

</div>
