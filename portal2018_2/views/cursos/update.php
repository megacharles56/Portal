<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */

$this->title = 'Actualizar Cursos: ' .
$model->curso_id;

$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->curso_id, 'url' => ['view', 'id' => $model->curso_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursos-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
