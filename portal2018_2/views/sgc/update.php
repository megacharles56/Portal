<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sgc */

$this->title = 'Actualizar Sgc: ' .
$model->sgc_id;

$this->params['breadcrumbs'][] = ['label' => 'Sgcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sgc_id, 'url' => ['view', 'id' => $model->sgc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sgc-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
