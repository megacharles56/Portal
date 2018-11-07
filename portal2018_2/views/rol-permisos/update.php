<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RolPermisos */

$this->title = 'Actualizar Rol Permisos: ' .
$model->rolpe_id;

$this->params['breadcrumbs'][] = ['label' => 'Rol Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rolpe_id, 'url' => ['view', 'id' => $model->rolpe_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rol-permisos-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
