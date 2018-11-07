<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstructuraContab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estructura-contab-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();
    $lista[] = 'estco_nombre';
    $lista[] = 'estco_numero';
    if (!$model->isNewRecord) {
        $estados = Variables::findAll(['varia_tabla' => '*', 'varia_campo' => 'ESTADO']);
        $itemsEdo = ArrayHelper::map($estados, 'varia_id', 'varia_cadena');
        $lista[] = ['dropDownList', 'estad_id', $itemsEdo, 'seleccione estado'];
    }
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
