<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Formatos */

$this->title = $model->forma_id;
$this->params['breadcrumbs'][] = ['label' => 'Formatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formatos-view">


    <?php
    if (!Yii::$app->user->isGuest)
        $this->HeaderView($model, $this->title, 'Formatos', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'forma_id',
            'forma_nombre',
            'forma_url:url',
        ],
    ])
    ?>

</div>
