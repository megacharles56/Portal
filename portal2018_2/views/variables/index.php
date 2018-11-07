<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VariablesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Variables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variables-index">
    
   <?php echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
        'Crear Variables ' : ''); ?>  

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php $columnData = [['class' => 'yii\grid\SerialColumn'],
                    'varia_id',
            'modificacion',
            'varia_tabla',
            'varia_campo',
            'varia_cadena',
          //'varia_extra',
          //'varia_info',
          //'varia_numerico',
          //'varia_fecha',
];        
        /// aqui se debe evaluar si siempre hacerlo o no, el rendimiento es muy bajo
        $template = $this->getBtnTemplate($this->context->ifcan('view'), $this->context->ifcan('edit'), $this->context->ifcan('delete'));
        
        if ( $template <> '' ){
           $colBtn = [['class' => 'yii\grid\ActionColumn','template' => $template]];
            $cols = array_merge( $columnData , $colBtn );
            }
        else
           {$cols = $columnData;}
        
        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
 'columns' =>  $cols 
        ]);
        ?>

        

        </div>
