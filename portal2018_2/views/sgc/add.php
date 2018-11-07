<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sgc */

$this->title = 'Crear Sgc';

$this->params['breadcrumbs'][] = ['label' => 'Sgcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgc-add">
  
   <div class='row'> <div  class='col-md-4'>
            <h1>   <?= Html::encode($this->title) ?></h1>
            
        </div>
        <div class="col-md-6">
            <h2 style="font-size: 1.4em">Ingrese el nombre del participante y presione agregar, una vez esten todos en la tabla superior presione terminar.</h2>
        </div>
    </div>
     <?php
    echo
    $this->render('_formAdd', [
        'model' => $model, 'regis' => $regis, 'warning'=> $warning
    ])
    ?></div>
