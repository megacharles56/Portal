<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Archivos */

$this->title = 'Actualizar Archivos: ' .
$model->archi_id;

$this->params['breadcrumbs'][] = ['label' => 'Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->archi_id, 'url' => ['view', 'id' => $model->archi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="archivos-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
