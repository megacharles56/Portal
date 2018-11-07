<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VpermisolaboralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vpermisolaborals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vpermisolaboral-index">
    
   <?php echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
        'Crear Vpermisolaboral ' : ''); ?>  

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php $columnData = [['class' => 'yii\grid\SerialColumn'],
                    'perla_id',
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
        
        if ( $template <> '' ){
          // $colBtn = [['class' => 'yii\grid\ActionColumn','template' => $template]];
            
$colBtn = $this->GetbtnsGrid(true,true,true);
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
