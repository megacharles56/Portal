<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Roles;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarRol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuar-rol-formAdd">
    <?php
    $form = ActiveForm::begin();
    //  $col = $form->field($model, 'usuar_id')->textInput(); 
   
    $elementos = Roles::find()->all();
    $items = ArrayHelper::map($elementos, 'rol_id', 'rol_nombre');
    $col = $form->field($model, 'rol_id')->dropDownList($items, ['prompt' => 'seleccione el rol a agregar']);
    
    //$col = $form->field($model, 'rol_id')->textInput();
    echo $this->twoCols($col, '');  
    $this->finishForm($model,'usuarios', $model->usuar_id);
    ActiveForm::end();
    ?>
</div>
