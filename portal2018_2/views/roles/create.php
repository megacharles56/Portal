<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = 'Crear Roles';

$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>