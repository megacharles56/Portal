<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VpermisolaboralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permisos Laborales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vpermisolaboral-index">

    <?php
    echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
                    'Crear Permiso Laboral ' : '');
    ?>  

    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

    <?php
    $columnData = [['class' => 'yii\grid\SerialColumn'],
//                    'perla_id',
        // 'modificacion',
        'perla_dia_inicial',
        //  'perla_hora_inicial',
        //  'perla_hora_final',
        //'perla_dia_final',
        //'perla_observaciones',
        'estado',
        'asunto',
        'solicitante',
            //'firmante1',
            //'firmante2',
    ];
    /// aqui se debe evaluar si siempre hacerlo o no, el rendimiento es muy bajo
    $template = $this->getBtnTemplate($this->context->ifcan('view'), $this->context->ifcan('edit'), $this->context->ifcan('delete'));

    if ($template <> '') {
        // $colBtn = [['class' => 'yii\grid\ActionColumn','template' => $template]];

        $colBtn = $this->GetbtnsGrid(true, true, false);
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