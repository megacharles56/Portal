<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PerpuFormacion */

$this->title = 'Agregar Formación a ' . $model->perpu->perpu_nombre_completo;

$this->params['breadcrumbs'][] = ['label' => 'Perpu Formacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perpu-formacion-add">

    <div class='row'> 
        <h1>   <?= Html::encode($this->title) ?></h1>
    </div>
    <?php
    echo
    $this->render('_formAdd', [
        'model' => $model,
    ])
    ?>
</div>
