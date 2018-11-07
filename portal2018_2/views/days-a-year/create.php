<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DaysAYear */

$this->title = 'Crear Days Ayear';

$this->params['breadcrumbs'][] = ['label' => 'Days Ayears', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="days-ayear-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
