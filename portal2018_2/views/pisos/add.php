<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pisos */

$this->title = 'Crear Pisos '.$model->edifi->edifi_nombre;

$this->params['breadcrumbs'][] = ['label' => 'Pisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pisos-add">
    <h1>   <?= Html::encode($this->title) ?></h1>

    <?php
    echo
    $this->render('_formAdd', [
        'model' => $model, 
    ])
    ?>
</div>
