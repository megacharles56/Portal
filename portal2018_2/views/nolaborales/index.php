<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NolaboralesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'No laborales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nolaborales-index  row">
    <div class="col-md-7 col-md-offset-2">
        <?php
        echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
                        'Alta de día no laboral' : '');
        // echo $this->render('_search', ['model' => $searchModel]);    
        $columnData = [['class' => 'yii\grid\SerialColumn'],
            //   'nolab_id',
            'nolab_dia',
            'nolab_motivo',
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
</div>
