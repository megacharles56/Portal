<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DaysAYear */

$this->title = $model->dayea_id;
$this->params['breadcrumbs'][] = ['label' => 'Days Ayears', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="days-ayear-view row">
    <div class="col-md6 col-md-offset-2">
        <?php
        $this->HeaderView($model, $this->title, 'DaysAYear', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'dayea_id',
                'dayea_year',
                'dayea_days',
            ],
        ])
        ?>
    </div>
</div>

