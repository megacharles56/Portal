<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstructuraContab */

$this->title = 'Actualizar Estructura Contab: ' .
$model->estco_id;

$this->params['breadcrumbs'][] = ['label' => 'Estructura Contabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->estco_id, 'url' => ['view', 'id' => $model->estco_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estructura-contab-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
