<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">
    <?php
    $lista = [];
    $form = ActiveForm::begin();
    $lista[] = 'usuar_usuario';
    $lista[] = 'usuar_nombre';
    $lista[] = 'usuar_clave';
    $lista[] = 'usuar_correo_1';
    $lista[] = 'usuar_correo_2';
    $lista[] = 'usuar_tel_1';
    $lista[] = 'usuar_tel_2';
    $lista[] = 'usuar_ext_1';
    $lista[] = 'usuar_ext_2';
    $lista[] = 'usuar_relacion_id';
    $lista[] = 'usuar_relacion_nombre';
    $this->fTwocols($this, $form, $model, $lista);

    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
