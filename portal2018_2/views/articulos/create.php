<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Articulos */

$this->title = 'Crear Articulos';

$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulos-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
