<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Domicilios */

$this->title = 'Crear Domicilios';

$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="domicilios-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
