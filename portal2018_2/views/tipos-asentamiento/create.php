<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TiposAsentamiento */

$this->title = 'Crear Tipos Asentamiento';

$this->params['breadcrumbs'][] = ['label' => 'Tipos Asentamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-asentamiento-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
