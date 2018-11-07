<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TiposArticulo */

$this->title = 'Actualizar Tipos Articulo: ' .
$model->tiart_id;

$this->params['breadcrumbs'][] = ['label' => 'Tipos Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tiart_id, 'url' => ['view', 'id' => $model->tiart_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipos-articulo-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
