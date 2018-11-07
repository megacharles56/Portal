<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Salones;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\SalonesLigados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salones-ligados-formAdd">

    <?php
    $form = ActiveForm::begin();
    $ubicacion = $model->salon->salon_ubicacion;
    $salones = Salones::find()->where("salon_ubicacion= $ubicacion")->all();
    $items = ArrayHelper::map($salones, 'salon_id', 'salon_nombre');
    $lista[] = ['hidden', 'salon_id'];
    $lista[] = ['dropDownList', 'salig_salon_ligado', $items, 'seleccione el salon'];

    $this->fTwocols($this, $form, $model, $lista);
    $this->finishForm($model);
    ActiveForm::end();
    ?>
</div>
