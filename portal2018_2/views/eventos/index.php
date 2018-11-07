<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventos-index">

    <?php echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
                    'Crear Eventos ' : '');
    ?>  

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?php
    $columnData = [['class' => 'yii\grid\SerialColumn'],
        //         'event_id',
        // 'autor',
        // 'modificacion',
        'estado',
        'event_evento',
        'event_fecha',
        'event_inicio',
        'event_fin',
        'salon_nombre',
            //'estor_id',
            //'emple_id',
            //'salon_id',
            //'event_responsable',
            //'event_menu',
            //'event_pax',
            //'event_servicio',
            //'event_acomodo',
            //'event_observaciones',
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
