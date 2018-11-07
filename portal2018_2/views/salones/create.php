<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Salones */

$this->title = 'Crear Salón';

$this->params['breadcrumbs'][] = ['label' => 'Salones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salones-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
