<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilesPuesto */

$this->title = 'Actualizar Perfiles Puesto: ' .
        $model->perpu_id;

$this->params['breadcrumbs'][] = ['label' => 'Perfiles Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perpu_id, 'url' => ['view', 'id' => $model->perpu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfiles-puesto-update forma">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    /*
    if ($warning <> '')
        echo
        "<span class='text-danger bg-info'
           style='font-size: 1.4em; border: solid blue 1px; padding: 4px'>" .
        $warning . "</span>";
    
    */
    ?>     
    <?=
    $this->render('_form', [
        'model' => $model, 
    ])
    ?>

</div>
