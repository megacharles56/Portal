<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pisos */

$this->title = 'Actualizar Pisos: ' .
$model->piso_id;

$this->params['breadcrumbs'][] = ['label' => 'Pisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->piso_id, 'url' => ['view', 'id' => $model->piso_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pisos-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
