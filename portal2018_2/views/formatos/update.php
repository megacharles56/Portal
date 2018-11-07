<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Formatos */

$this->title = 'Actualizar Formatos: ' .
$model->forma_id;

$this->params['breadcrumbs'][] = ['label' => 'Formatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->forma_id, 'url' => ['view', 'id' => $model->forma_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="formatos-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
