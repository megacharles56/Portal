<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Roles;

/* @var $this yii\web\View */
/* @var $model app\models\RolMenu */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="rol-menu-form col-md-9 " > 
    <?php
    $lista = [];
    $form = ActiveForm::begin();
    echo $form->field($model, 'rol_id')->input('hidden')->label(false);
    $lista[] = 'rolme_label';
    $lista[] = 'rolme_url';
    $lista[] = 'rolme_orden';
    $lista[] = 'rolme_tooltip';
    $this->fTwocols($this, $form, $model, $lista);
    $this->finishForm($model);
    ActiveForm::end();
    ?>    
</div>
