<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\Vempleados;
use app\models\Usuarios;
use app\models\PermisoLaboralSearch;
use app\models\PermisoLaboral;
use app\models\AutorizacionesSearch;
use app\models\Autorizaciones;
use yii\grid\GridView;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<br> <br> <br> <br> 
<div id ='gridUno'>
    <div id = 'col1'> 
        <?php
        // permisos
        
        $usr = Usuarios::find()->where(['usuar_relacion_id' => $model->emple_id])->one();

        $searchModel = new PermisoLaboralSearch();
        $dataProvider = $searchModel->search(NULL);
        $dataProvider->query->andWhere(['emple_id' => $usr->usuar_relacion_id]);
        $m = new PermisoLaboral();

        /* @todo revisar alcance... */
        /* @todo revisar x k salen dos renglones? */
        $cols1 = [['class' => 'yii\grid\SerialColumn'], 'perla_dia_inicial'];
        $btns = $this->GetbtnsGrid(true, false, false, $m);
        $cols = array_merge($cols1, $btns);

        echo '<h2>Permisos</h2>';

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $cols
        ]);
        ?>
    </div >  <!--col1 -->
    <div id =  'col2'> 
        <?php
        $searchModel = new AutorizacionesSearch();
        $dataProvider = $searchModel->search(NULL);
        $dataProvider->query->andWhere(['autor_autoriza' => $usr->usuar_id]);
        $m = new Autorizaciones();

        /* @todo revisar alcance... */
        /* @todo revisar x k salen dos renglones? */
        $cols1 = [['class' => 'yii\grid\SerialColumn'], 'perla.perla_dia_inicial', 'autor_autorizacion'];
        $btns = $this->GetbtnsGrid(true, true, false, $m);
        $cols = array_merge($cols1, $btns);
        
        echo '<h2>Autorizaciones</h2>';
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $cols
        ]);
        ?>
    </div> <!--col2 -->
</div>  <!--grid -->

