<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vpermisos */

$this->title = 'Actualizar Vpermisos: ' .
$model->permi_id;

$this->params['breadcrumbs'][] = ['label' => 'Vpermisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->permi_id, 'url' => ['view', 'id' => $model->permi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vpermisos-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
