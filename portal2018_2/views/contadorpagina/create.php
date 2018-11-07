<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contadorpagina */

$this->title = 'Crear Contadorpagina';

$this->params['breadcrumbs'][] = ['label' => 'Contadorpaginas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contadorpagina-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
