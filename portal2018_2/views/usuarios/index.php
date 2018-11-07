<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <?php echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
                    'Crear Usuarios ' : '');
    ?>  

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?php
    $columnData = [['class' => 'yii\grid\SerialColumn'],
        //'usuar_id',
        'usuar_usuario',
        'usuar_nombre',
        'usuar_clave',
        'usuar_correo_1',
            //'usuar_correo_2',
            //'usuar_tel_1',
            //'usuar_tel_2',
            //'usuar_ext_1',
            //'usuar_ext_2',
            //'usuar_relacion_id',
            //'usuar_relacion_nombre',
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
