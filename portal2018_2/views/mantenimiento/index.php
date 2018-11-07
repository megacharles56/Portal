<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MantenimientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mantenimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mantenimiento-index">
    
   <?php echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
        'Crear Mantenimiento ' : ''); ?>  

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php $columnData = [['class' => 'yii\grid\SerialColumn'],
                    'manto_id',
            'manto_folio_s',
            'manto_folio_m',
            'manto_folio_e',
            'autor',
          //'modificacion',
          //'manto_falla',
          //'manto_observaciones',
          //'manto_f_solicitud',
          //'manto_h_solicitud',
          //'manto_responsable',
          //'manto_inven_id',
          //'manto_f_inicio',
          //'manto_h_inicio',
          //'manto_diagnostico',
          //'manto_acciones',
          //'manto_observaciones_m',
          //'manto_f_entrega',
          //'manto_h_entrega',
          //'manto_f_recepcion',
          //'manto_h_recepcion',
          //'manto_califiacion',
          //'manto_estado',
          //'manto_tipo_manto',
          //'manto_f_preferente',
          //'manto_h_preferente',
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
