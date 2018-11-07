<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nolaborales */

$this->title = $model->nolab_id;
$this->params['breadcrumbs'][] = ['label' => 'Nolaborales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nolaborales-view row">
    <div class="col-md-7 col-md-offset-2">


        <?php
        $this->HeaderView($model, $this->title, 'Nolaborales', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
          //      'nolab_id',
                'nolab_dia',
                'nolab_motivo',
            ],
        ])
        ?>
    </div>
</div>
