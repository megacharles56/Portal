<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Variables;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Salones */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class ="col-md-9 col-md-offset-2">
        <div class="salones-form">
            <?php
            $lista = [];
            $form = ActiveForm::begin();
            $lista[] = 'salon_nombre';
            $tipos = Variables::find()->where("varia_tabla='SALONES' AND varia_campo= 'UBICACION'")->all();
            $items = ArrayHelper::map($tipos, 'varia_id', 'varia_cadena');
            $lista[] = ['dropDownList', 'salon_ubicacion', $items, 'seleccione la clase'];
            $this->fTwocols($this, $form, $model, $lista);
            $this->finishForm($model);
            ActiveForm::end();
            ?>    
        </div>
    </div>
</div>