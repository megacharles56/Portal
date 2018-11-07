<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerpuFormacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perpu-formacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pform_id') ?>

    <?= $form->field($model, 'autor') ?>

    <?= $form->field($model, 'modificacion') ?>

    <?= $form->field($model, 'perpu_id') ?>

    <?= $form->field($model, 'pform_curso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
