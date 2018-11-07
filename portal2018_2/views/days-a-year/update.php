<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DaysAYear */

$this->title = 'Actualizar Days Ayear: ' .
$model->dayea_id;

$this->params['breadcrumbs'][] = ['label' => 'Days Ayears', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dayea_id, 'url' => ['view', 'id' => $model->dayea_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="days-ayear-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
