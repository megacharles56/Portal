<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PpRelacionesExt */

$this->title = 'Actualizar Pp Relaciones Ext: ' .
$model->prele_id;

$this->params['breadcrumbs'][] = ['label' => 'Pp Relaciones Exts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prele_id, 'url' => ['view', 'id' => $model->prele_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pp-relaciones-ext-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
