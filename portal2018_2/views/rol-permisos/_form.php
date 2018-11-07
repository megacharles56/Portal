<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Roles;
use app\models\Permisos;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RolPermisos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-permisos-form">
    <?php
    $permisos = Permisos::find()->all();
    $itemsP = ArrayHelper::map($permisos, 'permi_id', 'permi_clase');
    $roles = Roles::find()->all();
    $itemsR = ArrayHelper::map($roles, 'clase_id', 'clase_clase');

    $lista = [];
    $form = ActiveForm::begin();
    $lista[] = ['dropDownList', 'rol_id', $itemsR, 'Seleccione el rol'];
    $lista[] = ['dropDownList', 'permi_id', $itemsP, 'Seleccione el permiso'];
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
