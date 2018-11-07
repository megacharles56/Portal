<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PerpuFunciones */


$this->title = 'Agregar Formación a ' . $model->perpu->perpu_nombre_completo;

$this->params['breadcrumbs'][] = ['label' => 'Perpu Funciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1>   <?= Html::encode($this->title) ?></h1>
    <?php
    echo
    $this->render('_formAdd', [
        'model' => $model
    ])
    ?>
</div>


