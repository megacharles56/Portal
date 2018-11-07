<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Nolaborales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nolaborales-form row">


    <div class="col-md-7 col-md-offset-2">

        <?php
        $lista = [];
        $form = ActiveForm::begin();
        $col1 = $form->field($model, 'nolab_dia')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'El dia...'],
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]);                
        $lista[] = ['raw',$col1];
        $lista[] = 'nolab_motivo';
        $this->fTwocols($this, $form, $model, $lista);

        $this->finishForm($model);

        ActiveForm::end();
        ?>    
    </div>
</div>
