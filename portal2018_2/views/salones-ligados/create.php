<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalonesLigados */

$this->title = 'Crear Salones Ligados';

$this->params['breadcrumbs'][] = ['label' => 'Salones Ligados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salones-ligados-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
