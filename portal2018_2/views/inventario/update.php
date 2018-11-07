<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventario */

$this->title = 'Actualizar Inventario: ' .
$model->inven_id;

$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inven_id, 'url' => ['view', 'id' => $model->inven_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventario-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
