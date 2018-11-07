<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerpuFormacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perpu-formacion-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();
    $lista[] = 'autor';
    $lista[] = 'modificacion';
    $lista[] = 'perpu_id';
    $lista[] = 'pform_curso';
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
