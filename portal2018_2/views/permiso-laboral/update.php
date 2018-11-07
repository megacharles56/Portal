<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PermisoLaboral */

$this->title = 'Actualizar Permiso Laboral: ' .
$model->perla_id;

$this->params['breadcrumbs'][] = ['label' => 'Permiso Laborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perla_id, 'url' => ['view', 'id' => $model->perla_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="permiso-laboral-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
