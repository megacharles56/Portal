<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vpermisolaboral */

$this->title = 'Actualizar Vpermisolaboral: ' .
$model->perla_id;

$this->params['breadcrumbs'][] = ['label' => 'Vpermisolaborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perla_id, 'url' => ['view', 'id' => $model->perla_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vpermisolaboral-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
