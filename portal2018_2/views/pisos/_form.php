<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pisos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pisos-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();
    $lista[] = 'edifi_id';
    $lista[] = 'piso_nombre';
    $this->fTwocols($this, $form, $model, $lista);
    $this->finishForm($model);
    ActiveForm::end();
    ?>    

</div>
