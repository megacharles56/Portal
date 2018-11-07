<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sgc */

$this->title = 'Crear Sgc';

$this->params['breadcrumbs'][] = ['label' => 'Sgcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgc-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
