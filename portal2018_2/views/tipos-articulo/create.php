<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TiposArticulo */

$this->title = 'Crear Tipos Articulo';

$this->params['breadcrumbs'][] = ['label' => 'Tipos Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-articulo-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
