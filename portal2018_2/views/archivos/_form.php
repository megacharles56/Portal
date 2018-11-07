<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Archivos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivos-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();
//    $lista[] = 'autor';
//    $lista[] = 'emple_id';
//    $lista[] = 'modificacion';
    $lista[] = ['fileInput','_archivo']; // $form->field($model, '_archivo')->fileInput();
    $lista[] = 'archi_nombre';
    $this->fTwocols($this, $form, $model, $lista);
    $this->finishForm($model);
    ActiveForm::end();
    ?>    

</div>
