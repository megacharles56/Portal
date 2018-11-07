<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstructuraContab */

$this->title = 'Crear Estructura Contab';

$this->params['breadcrumbs'][] = ['label' => 'Estructura Contabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estructura-contab-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
