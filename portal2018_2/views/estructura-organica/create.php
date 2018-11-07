<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstructuraOrganica */

$this->title = 'Crear Estructura Organica';

$this->params['breadcrumbs'][] = ['label' => 'Estructura Organicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estructura-organica-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
