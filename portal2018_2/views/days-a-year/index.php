<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DaysAYearSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Days Ayears';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ? 'Crear DaysAYear ' : ' ');
$columnData = [['class' => 'yii\grid\SerialColumn'],
    'dayea_year',
    'dayea_days',
];
/// aqui se debe evaluar si siempre hacerlo o no, el rendimiento es muy bajo
$template = $this->getBtnTemplate($this->context->ifcan('view'), $this->context->ifcan('edit'), $this->context->ifcan('delete'));

if ($template <> '') {
    $colBtn = [['class' => 'yii\grid\ActionColumn', 'template' => $template]];
    $cols = array_merge($columnData, $colBtn);
} else {
    $cols = $columnData;
}
?>
<div class="days-ayear-index ">
    <div class="row">   
        <div  class="col-md5 col-md-offset-3">

            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $cols
            ]);
            ?>
        </div>        
    </div>
</div>
