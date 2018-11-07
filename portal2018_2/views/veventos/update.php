<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Veventos */

$this->title = 'Actualizar Veventos: ' .
$model->event_id;

$this->params['breadcrumbs'][] = ['label' => 'Veventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->event_id, 'url' => ['view', 'id' => $model->event_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="veventos-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
