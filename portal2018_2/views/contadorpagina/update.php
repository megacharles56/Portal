<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contadorpagina */

$this->title = 'Actualizar Contadorpagina: ' .
$model->conpa_id;

$this->params['breadcrumbs'][] = ['label' => 'Contadorpaginas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->conpa_id, 'url' => ['view', 'id' => $model->conpa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contadorpagina-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
