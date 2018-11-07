<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Importcp */

$this->title = 'Crear Importcp';

$this->params['breadcrumbs'][] = ['label' => 'Importcps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="importcp-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
