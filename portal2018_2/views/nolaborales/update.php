<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nolaborales */

$this->title = 'Actualizar Nolaborales: ' .
$model->nolab_id;

$this->params['breadcrumbs'][] = ['label' => 'Nolaborales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nolab_id, 'url' => ['view', 'id' => $model->nolab_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nolaborales-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
