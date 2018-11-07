<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Variables;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();
    $lista[] = 'perso_id';
    $lista[] = 'modificacion';
    $lista[] = 'estad_id';
    $lista[] = 'autor';
    $lista[] = 'historia';
    $lista[] = 'perso_nombre1';
    $lista[] = 'perso_nombre2';
    $lista[] = 'perso_nombre3';
    $lista[] = 'perso_paterno';
    $lista[] = 'perso_materno';
    $lista[] = 'perso_titulo';
    $lista[] = 'perso_sobrenombre';
    $lista[] = 'perso_rfc';
    $lista[] = 'perso_curp';
    $elementos = Variables::findAll(['varia_tabla' => '*', 'varia_campo' => 'ESTADO CIVIL']);
    $items = ArrayHelper::map($elementos, 'varia_id', 'varia_cadena');
    $lista[] = ['dropDownList', 'perso_estado_civil', $items, 'Estado Civil'];    
    $lista[] = 'perso_nombre';
    $lista[] = 'perso_nacionalidad';
    $lista[] = 'perso_fecha_nacimiento';
    $lista[] = 'perso_sexo';
    $lista[] = 'domic_id';
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
