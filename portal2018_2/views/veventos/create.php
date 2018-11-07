<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Veventos */

$this->title = 'Crear Veventos';

$this->params['breadcrumbs'][] = ['label' => 'Veventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veventos-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
