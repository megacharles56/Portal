<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\Vempleados;
use app\models\Usuarios;
use app\models\PermisoLaboralSearch;
use app\models\PermisoLaboral;
use app\models\AutorizacionesSearch;
use app\models\Autorizaciones;
use kartik\grid\GridView;

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
        $usr = Usuarios::find()->where(['usuar_relacion_id' => $model->emple_id])->one();

        $searchModel = new PermisoLaboralSearch();
        $dataProvider = $searchModel->search(NULL);
        $dataProvider->query->andWhere(['autor' => $usr->usuar_id]);
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
        
        
        
$c2 =  [ 'perla_dia_inicial','estad.varia_cadena'];
$this->despliegaDetalle
    ('Permisos', 'permiso-laboral', $model->emple_id, $dataProvider, 
        $c2, 'nuevo permiso', $accion = 'add', false,  true, $ver = true
   );
        
        
        ?>
    </div >  <!--col1 -->
    <div id =  'col2'> 
        <?php
        $searchModel = new AutorizacionesSearch();
        $dataProvider = $searchModel->search(NULL);
        $dataProvider->query->andWhere(['autor_autoriza' => $usr->usuar_id]);

        /* @todo revisar alcance... */
        /* @todo revisar x k salen dos renglones? */
        $cols1 = [['class' => 'yii\grid\SerialColumn'],
            'perla.perla_dia_inicial',
            [
                'attribute' => 'autor_autorizacion',
                'format' => 'text',
                'width' => '100px',
                'pageSummary' => 'Total'
            ],
        ];
        $btns = $this->GetbtnsGrid(true, true, false, $m);
        $cols = array_merge($cols1, $btns);

        echo '<h2>Autorizaciones</h2>';
        echo GridView::widget(
                ['dataProvider' => $dataProvider,
                    'autoXlFormat' => true,
                    'export' => [
                        'fontAwesome' => true,
                        'showConfirmAlert' => false,
                        'target' => GridView::TARGET_BLANK,
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel],
                    'columns' => $cols,
                    'pjax' => true,
              //      'showPageSummary' => true,
                    'panel' => [
                        'type' => 'primary',
                        'heading' => 'Products'
        ]]);
        ?>
    </div> <!--col2 -->
</div>  <!--col1 -->


<?php
$c2 =  [ 'perla.perla_dia_inicial',
            [
                'attribute' => 'autor_autorizacion',
                'format' => 'text',
            ]];
$this->despliegaDetalle
    ('autorizaciones', 'autorizaciones', $model->emple_id, $dataProvider, 
        $c2, 'nuevo permiso', $accion = 'add', false,  true, $ver = true
   );
?>        

