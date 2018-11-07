<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Almacen */

$this->title = 'Actualizar Almacen: ' .
$model->almac_id;

$this->params['breadcrumbs'][] = ['label' => 'Almacens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->almac_id, 'url' => ['view', 'id' => $model->almac_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="almacen-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
