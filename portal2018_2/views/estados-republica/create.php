<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadosRepublica */

$this->title = 'Crear Estados Republica';

$this->params['breadcrumbs'][] = ['label' => 'Estados Republicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estados-republica-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
