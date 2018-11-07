<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MySolicitud */

$this->title = 'Crear My Solicitud';

$this->params['breadcrumbs'][] = ['label' => 'My Solicituds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-solicitud-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
