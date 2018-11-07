<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pisos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pisos-formAdd">

    <?php     
    $lista = [];
    $form = ActiveForm::begin();
    $lista[] = 'piso_nombre';
    $lista[] = ['hidden','edifi_id'];
    $this->fTwocols($this, $form, $model, $lista);
    $this->finishForm($model);
    ActiveForm::end();
    ?>
</div>
