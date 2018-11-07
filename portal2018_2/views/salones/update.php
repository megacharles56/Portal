<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salones */

$this->title = 'Actualizar Salones: ' .
$model->salon_id;

$this->params['breadcrumbs'][] = ['label' => 'Salones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->salon_id, 'url' => ['view', 'id' => $model->salon_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salones-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
