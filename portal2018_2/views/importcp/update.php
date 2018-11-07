<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Importcp */

$this->title = 'Actualizar Importcp: ' .
$model->impcp_id;

$this->params['breadcrumbs'][] = ['label' => 'Importcps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->impcp_id, 'url' => ['view', 'id' => $model->impcp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="importcp-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
