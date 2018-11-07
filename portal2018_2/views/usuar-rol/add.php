<?php

use yii\helpers\Html;
use app\models\Usuarios;
use yii\widgets\ActiveForm;
use app\models\Roles;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarRol */

$u = Usuarios::findOne($model->usuar_id);
$this->title = 'agregar rol a : ';

$this->params['breadcrumbs'][] = ['label' => 'Usuar Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuar-rol-add">

    <div class='row'> <div  class='col-md-4'>
            <h1>   <?= Html::encode($this->title) . ' <span style =  "color: blue"> ' . $u->usuar_nombre . '</span>' ?></h1>
        </div>
    </div>

    <div class="usuar-rol-formAdd">
        <?php
        $form = ActiveForm::begin();
        echo $form->field($model, 'usuar_id')->input('hidden')->label(false);
        $elementos = Roles::find()->all();
        $items = ArrayHelper::map($elementos, 'rol_id', 'rol_nombre');
        $col = $form->field($model, 'rol_id')->dropDownList($items, ['prompt' => 'seleccione el rol a agregar']);

        //$col = $form->field($model, 'rol_id')->textInput();
        echo $this->twoCols($col, '');
        $this->finishForm($model, 'usuarios', $model->usuar_id);
        ActiveForm::end();
        ?>
    </div>
