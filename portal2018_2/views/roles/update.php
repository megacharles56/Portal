<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = 'Actualizar Roles: ' .
$model->rol_id;

$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rol_id, 'url' => ['view', 'id' => $model->rol_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roles-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
