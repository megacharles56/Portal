<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstructuraOrganica */

$this->title = 'Actualizar Estructura Organica: ' .
$model->estor_id;

$this->params['breadcrumbs'][] = ['label' => 'Estructura Organicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->estor_id, 'url' => ['view', 'id' => $model->estor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estructura-organica-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
