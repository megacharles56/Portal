<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Empleados */

$this->title = 'Crear Empleados';

$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
