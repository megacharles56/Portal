<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Variables */

$this->title = 'Crear Variables';

$this->params['breadcrumbs'][] = ['label' => 'Variables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variables-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
