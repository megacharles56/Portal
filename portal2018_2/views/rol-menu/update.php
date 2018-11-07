<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RolMenu */

$this->title = 'Actualizar Rol Menu: ' .
$model->rolme_id;

$this->params['breadcrumbs'][] = ['label' => 'Rol Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rolme_id, 'url' => ['view', 'id' => $model->rolme_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rol-menu-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
