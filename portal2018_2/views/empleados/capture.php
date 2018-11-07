<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Personas;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin();
$elementos = Personas::find()->all();
$items = ArrayHelper::map($elementos, 'perso_id', 'perso_nombre');
$lista[] = ['dropDownList', 'perso_id', $items, 'seleccione  a la persona'];

$this->fTwocols($this, $form, $model, $lista);
$this->finishForm($model);
ActiveForm::end();
