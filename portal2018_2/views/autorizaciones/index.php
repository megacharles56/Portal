<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Empleados;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutorizacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Autorizaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autorizaciones-index">

    <?php
    echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
                    'Crear Autorizaciones ' : '');
    ?>  

    <?php // echo $this->render('_search', ['model' => $searchModel]);    ?>

    <?php
    $columnData = [['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'autorAutoriza',
            'label' => 'autoriza',
            'value' => function ($model) {
                $u = Usuarios::findOne($model->autorAutoriza->usuar_id);
                $e = Empleados::findOne($u->usuar_relacion_id);
                return $e->perso->perso_nombre;
            },
        ],
        //'modificacion',
        ['attribute' => 'perla',
            'label' => 'solicita',
            'value' => function ($model) {
                $u = Usuarios::findOne($model->perla->autor);
                $e = Empleados::findOne($u->usuar_relacion_id);
                return $e->perso->perso_nombre;
            },
        ],
        ['attribute' => 'perla',
            'label' => 'Día',
            'value' => 'perla.perla_dia_inicial'
        ],
        'autor_autorizacion',
    ];
    /// aqui se debe evaluar si siempre hacerlo o no, el rendimiento es muy bajo
    $template = $this->getBtnTemplate($this->context->ifcan('view'), $this->context->ifcan('edit'), $this->context->ifcan('delete'));

    if ($template <> '') {
        $colBtn = [['class' => 'yii\grid\ActionColumn', 'template' => $template]];
        $cols = array_merge($columnData, $colBtn);
    } else {
        $cols = $columnData;
    }

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $cols
    ]);
    ?>



</div>
