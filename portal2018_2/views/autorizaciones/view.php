<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Autorizaciones */

$this->title = $model->autor_id;
$this->params['breadcrumbs'][] = ['label' => 'Autorizaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autorizaciones-view">


    <?php
    $this->HeaderView($model, $this->title, 'Autorizaciones', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'autor_id',
            'autor_autoriza',
            'modificacion',
            'perla_id',
            'autor_autorizacion',
        ],
    ])
    ?>

</div>
