<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\EstructuraContab;
use app\models\EstructuraOrganica;
use app\models\Variables;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\EstructuraOrganica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estructura-organica-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();
//  $lista[] = 'autor';
//  $lista[] = 'modificacion';
    if (!$model->isNewRecord) {
        $estados = Variables::findAll(['varia_tabla' => '*', 'varia_campo' => 'ESTADO']);
        $itemsEdo = ArrayHelper::map($estados, 'varia_id', 'varia_cadena');
    }

    $tipoEst = Variables::findAll(['varia_tabla' => 'ESTRUCTURA_ORGANICA', 'varia_campo' => 'ESTOR_TIPO_ESTRUCTURA']);
    $itemsEst = ArrayHelper::map($tipoEst, 'varia_id', 'varia_cadena');

//* @todo quitar de la lista el ectual cuando sea update*/
    $estructuras = EstructuraOrganica::find()->all();
    $itemsEstructuras = ArrayHelper::map($estructuras, 'estor_id', 'estor_nombre');

    $estructurasC = EstructuraContab::find()->all();
    $itemsEstructurasC = ArrayHelper::map($estructurasC, 'estco_id', 'estco_nombre');

    if (!$model->isNewRecord)
        $lista[] = ['dropDownList', 'estad_id', $itemsEdo, 'seleccione estado'];
    $lista[] = 'estor_nombre';
    $lista[] = ['textArea', 'estor_objetivo'];
    $lista[] = ['dropDownList', 'estor_tipo_estructura', $itemsEst, 'seleccione tipo de Estructura'];
    $lista[] = ['dropDownList', 'estco_id', $itemsEstructurasC, 'Estructura contable'];
    $lista[] = ['dropDownList', 'estor_superior', $itemsEstructuras, 'Estructura superior'];
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
