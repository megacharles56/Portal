<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use app\models\Empleados;
use app\models\Usuarios;
use app\models\Personas;

/* @var $this yii\web\View */
/* @var $model app\models\PermisoLaboral */
?>
<div class="permiso-laboral-view">

    <?php
    //$p = Personas::find()->where(['perso_id'=>$model->autor]);
    
    $e =    Empleados::find()->where(['perso_id'=>$model->autor])->one();
    
    if ($model->perla_tipo == 'horas') {
        $despliegue = [['attribute' => 'perla_dia_inicial'],
                ['attribute' => 'perla_hora_inicial'],
                ['attribute' => 'perla_hora_final']];
    } else {
        $despliegue = [
                ['attribute' => 'perla_dia_inicial'],
                ['attribute' => 'perla_dia_final']];
    }
       
    echo DetailView::widget([
        'model' => $model,
        'mode' => DetailView::MODE_VIEW, 'buttons1' => '',
        'attributes' => [
            ['columns' => [
                    ['attribute' => 'autor', 'value'=> $e->perso->perso_nombre],
                    ['attribute' => 'modificacion'],
                    ['attribute' => 'estad', 'value'=>$model->estad->varia_cadena]]],
            ['columns' => $despliegue],
        ['attribute' =>'perlaAsunto',
          'value'=>$model->perlaAsunto->varia_cadena], 
        'perla_observaciones',            
        ]
    ]);
    ?>

</div>
