<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TiposAsentamiento */

$this->title = 'Actualizar Tipos Asentamiento: ' .
$model->tasen_id;

$this->params['breadcrumbs'][] = ['label' => 'Tipos Asentamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tasen_id, 'url' => ['view', 'id' => $model->tasen_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipos-asentamiento-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
