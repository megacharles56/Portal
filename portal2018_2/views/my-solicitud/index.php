<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MySolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permisos Previos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-solicitud-index">

    <?php echo $this->HeaderIndex($this->title, ''); ?>  

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?php
    $columnData = [['class' => 'yii\grid\SerialColumn'],
        'fecha_my_solicitud',
//        'no_emp',
        'nombre',
        [   'label' => 'dias',
            'attribute' => 'dias',
            'headerOptions' => ['width: 10%!important']
        ],
        [   'label' => 'mes',
            'attribute' => 'mes',
            'headerOptions' => ['width: 10%!important']
        ],        
        
        'status',
    ];
    /// aqui se debe evaluar si siempre hacerlo o no, el rendimiento es muy bajo
    $template = $this->getBtnTemplate($this->context->ifcan('view'), $this->context->ifcan('edit'), $this->context->ifcan('delete'));

    if ($template <> '') {
        $colBtn = [['class' => 'yii\grid\ActionColumn', 'template' => $template]];
        $cols = array_merge($columnData, $colBtn);
    } else {
        $cols = $columnData;
    }

    $defaultExportConfig = [
        GridView::EXCEL => ['label' => 'Salvar a Excel'],
        GridView::PDF => ['label' => 'Salvar a PDF'],
    ];

    echo GridView::widget([
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => 'PPermisos laborales',
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $cols, // check the configuration for grid columns by clicking button above
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        // set your toolbar
        'toggleDataOptions' => [
            'all' => [
                'icon' => 'resize-full',
                'label' => 'Todo',
                'class' => 'btn btn-default',
                'title' => 'Mostrar todo'
            ],
            'page' => [
                'icon' => 'resize-small',
                'label' => 'por página',
                'class' => 'btn btn-default',
                'title' => 'Mostrar primer página'
            ],
        ],
        'toolbar' => [
            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true,
        ],
        'exportConfig' => $defaultExportConfig,
        // parameters from the demo form
        'bordered' => 'true',
        'striped' => 'true',
        'condensed' => 'true',
        'responsive' => 'true',
        'hover' => '',
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => 'Permisos laborales',
        ],
        'persistResize' => 'false',
        'toggleDataOptions' => ['minCount' => 10],
        //'exportConfig' => $exportConfig,
        'itemLabelSingle' => 'permiso',
        'itemLabelPlural' => 'permisos',
    ]);
    ?>



</div>
