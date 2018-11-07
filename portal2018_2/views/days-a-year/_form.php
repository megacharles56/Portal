<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DaysAYear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="days-ayear-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();
    $lista[] = 'dayea_year';
    $lista[] = 'dayea_days';
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
