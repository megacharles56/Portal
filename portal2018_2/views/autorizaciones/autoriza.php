<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\Variables;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Autorizaciones */

$this->title = 'Actualizar Autorizaciones: ' .
        $model->autor_id;

$this->params['breadcrumbs'][] = ['label' => 'Autorizaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->autor_id, 'url' => ['view', 'id' => $model->autor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>


<div class="autorizaciones-update forma">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $pl = $model->perla;
    echo $this->render('../permiso-laboral/_view', [
        'model' => $pl,
    ]);

    $lista = [];
    $form = ActiveForm::begin();

    $elementos = Variables::findAll(['varia_tabla' => 'permiso_laboral', 'varia_campo' => 'perla_asunto']);
    $items = ArrayHelper::map($elementos, 'varia_id', 'varia_cadena');
    $lista[] = ['dropDownList', 'perla_asunto', $items, ''];

    $col1 = $form->field($model, 'perla_asunto')->dropDownList($items, ['prompt' => 'asunto...']);

    $items = ['SI' => 'SI', 'NO' => 'NO'];

    $lista[] = ['dropDownList', 'autor_autorizacion', $items, ''];
    $this->fTwocols($this, $form, $model, $lista);
    $this->finishForm($model);
    ActiveForm::end();
    ?>    

</div>
