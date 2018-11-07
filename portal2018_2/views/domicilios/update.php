<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Domicilios */

$this->title = 'Actualizar Domicilios: ' .
$model->domic_id;

$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->domic_id, 'url' => ['view', 'id' => $model->domic_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="domicilios-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
