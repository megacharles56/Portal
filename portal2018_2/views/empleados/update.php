<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */

$this->title = 'Actualizar Empleado NN : ' .
$model->emple_num_nomina;

$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emple_id, 'url' => ['view', 'id' => $model->emple_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empleados-update forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
