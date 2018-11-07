<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstructuraOrganica */

$this->title = $model->estor_id;
$this->params['breadcrumbs'][] = ['label' => 'Estructura Organicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estructura-organica-view">


    <?php
    $this->HeaderView($model, $this->title, 'EstructuraOrganica', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'estor_id',
            'autor',
            'modificacion',
            [
                'attribute' => 'estad_id',
                'label' => 'Estado',
                'value' => $model->estad->varia_cadena,
            ],
            'estor_nombre',
            'estor_objetivo',
            'estor_tipo_estructura',
            [
                'attribute' => 'estco_id',
                'label' => 'Estructura contable',
                'value' => $model->estco->estco_nombre,
            ],
            
            [
                'attribute' => 'estor_superior',
                'label' => 'Estructura superior',
                
                'value' =>  $model->estorSuperior? $model->estorSuperior->estor_nombre: '-' ,
            ],
        ],
    ])
    ?>

</div>
