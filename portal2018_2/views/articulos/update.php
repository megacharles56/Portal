<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Articulos */

$this->title = 'Actualizar Articulos: ' .
$model->artic_id;

$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->artic_id, 'url' => ['view', 'id' => $model->artic_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articulos-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
