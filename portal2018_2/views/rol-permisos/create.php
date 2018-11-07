<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RolPermisos */

$this->title = 'Crear Rol Permisos';

$this->params['breadcrumbs'][] = ['label' => 'Rol Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-permisos-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
