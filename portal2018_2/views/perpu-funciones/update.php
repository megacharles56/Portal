<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PerpuFunciones */

$this->title = 'Actualizar Perpu Funciones: ' .
$model->pfunc_id;

$this->params['breadcrumbs'][] = ['label' => 'Perpu Funciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pfunc_id, 'url' => ['view', 'id' => $model->pfunc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perpu-funciones-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
