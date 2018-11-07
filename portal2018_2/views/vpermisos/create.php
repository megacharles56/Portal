<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vpermisos */

$this->title = 'Crear Vpermisos';

$this->params['breadcrumbs'][] = ['label' => 'Vpermisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vpermisos-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
