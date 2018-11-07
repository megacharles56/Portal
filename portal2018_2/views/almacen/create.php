<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Almacen */

$this->title = 'Crear Almacen';

$this->params['breadcrumbs'][] = ['label' => 'Almacens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="almacen-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
