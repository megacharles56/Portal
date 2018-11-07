<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarRol */

$this->title = 'Actualizar Usuar Rol: ' .
$model->usrol_id;

$this->params['breadcrumbs'][] = ['label' => 'Usuar Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usrol_id, 'url' => ['view', 'id' => $model->usrol_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuar-rol-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
