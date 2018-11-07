<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Variables */

$this->title = 'Actualizar Variables: ' .
$model->varia_id;

$this->params['breadcrumbs'][] = ['label' => 'Variables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->varia_id, 'url' => ['view', 'id' => $model->varia_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="variables-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
