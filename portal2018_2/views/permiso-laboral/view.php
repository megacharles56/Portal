<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PermisoLaboral */

$this->title = $model->perla_id;
$this->params['breadcrumbs'][] = ['label' => 'Permiso Laborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permiso-laboral-view">

    <?php
    $this->HeaderView($model, $this->title, 'PermisoLaboral', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
    echo $this->render('_view', [
        'model' => $model,
    ])
    ?>

</div>
