<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PerpuHabilidad */

$this->title = $model->phabi_id;
$this->params['breadcrumbs'][] = ['label' => 'Perpu Habilidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perpu-habilidad-view">


    <?php
    $this->HeaderView($model, $this->title, 'PerpuHabilidad', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'phabi_id',
            'autor',
            'modificacion',
            'perpu_id',
            'phabi_habilidad',
        ],
    ])
    ?>

</div>
