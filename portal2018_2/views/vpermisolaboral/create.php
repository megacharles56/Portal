<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vpermisolaboral */

$this->title = 'Crear Vpermisolaboral';

$this->params['breadcrumbs'][] = ['label' => 'Vpermisolaborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vpermisolaboral-create forma">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
