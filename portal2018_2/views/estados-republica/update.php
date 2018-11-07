<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadosRepublica */

$this->title = 'Actualizar Estados Republica: ' .
$model->esrep_id;

$this->params['breadcrumbs'][] = ['label' => 'Estados Republicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->esrep_id, 'url' => ['view', 'id' => $model->esrep_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estados-republica-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
