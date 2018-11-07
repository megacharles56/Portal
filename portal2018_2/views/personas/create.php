<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = 'Crear Personas';

$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
