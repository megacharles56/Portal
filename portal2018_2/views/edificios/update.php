<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Edificios */

$this->title = 'Actualizar Edificios: ' .
$model->edifi_id;

$this->params['breadcrumbs'][] = ['label' => 'Edificios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->edifi_id, 'url' => ['view', 'id' => $model->edifi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edificios-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
