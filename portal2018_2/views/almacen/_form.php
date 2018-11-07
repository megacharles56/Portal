<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Almacen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="almacen-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();
    $lista[] = 'almac_producto';
    $lista[] = 'almac_clave';
    $lista[] = 'almac_seccion';
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
