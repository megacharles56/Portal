<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PermisoLaboral */

$this->title = 'Crear Permiso Laboral';

$this->params['breadcrumbs'][] = ['label' => 'Permiso Laborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permiso-laboral-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
