<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Permisos */

$this->title = 'Crear Permisos';

$this->params['breadcrumbs'][] = ['label' => 'Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permisos-add">

    <div class='row'> <div  class='col-md-4'>
            <h1>   <?= Html::encode($this->title) ?></h1>

        </div>
    </div>
    <?php
    echo
    $this->render('_formAdd', [
        'model' => $model
    ])
    ?></div>
