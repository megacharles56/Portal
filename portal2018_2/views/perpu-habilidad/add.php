<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PerpuHabilidad */

$this->title = 'Agregar habilidad a ' . $model->perpu->perpu_nombre_completo;
$this->params['breadcrumbs'][] = ['label' => 'Perpu Habilidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perpu-habilidad-add">
    <h1>   <?= Html::encode($this->title) ?></h1>
    <?php
    echo
    $this->render('_formAdd', [
        'model' => $model
    ])
    ?>
</div>
