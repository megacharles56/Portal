<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */

$this->title = 'Actualizar Mantenimiento: ' .
$model->manto_id;

$this->params['breadcrumbs'][] = ['label' => 'Mantenimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->manto_id, 'url' => ['view', 'id' => $model->manto_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mantenimiento-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
