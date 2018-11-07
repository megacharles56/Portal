<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nolaborales */

$this->title = 'Crear Nolaborales';

$this->params['breadcrumbs'][] = ['label' => 'Nolaborales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nolaborales-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
