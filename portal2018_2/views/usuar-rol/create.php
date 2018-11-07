<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsuarRol */

$this->title = 'Crear Usuar Rol';

$this->params['breadcrumbs'][] = ['label' => 'Usuar Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuar-rol-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
