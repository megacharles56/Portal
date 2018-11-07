<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PpRelacionesExt */

$this->title = 'Agregar Relación Externa a ' . $model->perpu->perpu_nombre_completo;

$this->params['breadcrumbs'][] = ['label' => 'Pp Relaciones Exts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pp-relaciones-ext-add">
    <h1>   <?= Html::encode($this->title) ?></h1>
    <?php
    echo
    $this->render('_formAdd', [
        'model' => $model,
    ])
    ?>
</div>
