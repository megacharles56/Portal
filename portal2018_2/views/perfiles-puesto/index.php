<?php

use yii\helpers\Html;
use yii\grid\GridView;
USE app\models\PerfilesPuesto;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerfilesPuestoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfiles Puestos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-puesto-index">
    <?php
    echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
                    'Crear PerfilesPuesto ' : '');

    $perfiles = PerfilesPuesto::find()->all();
    $itemsPerfiles = ArrayHelper::map($perfiles, 'perpu_id', 'perpu_nombre_completo');

    $form = ActiveForm::begin(['action' => ['chart']]);
    ?>
    <div class ="row" >
        <div class="col-md-6 col-md-offset-6"  style="margin-top: 20px; border: 2px solid darkblue; border-radius: 20px">
            <div class="row">
                <div class = 'col-md-10 '  >
                    <?php
                    echo $form->field($model, 'perpu_id')->dropDownList($itemsPerfiles, ['prompt' => 'Elemento Inicial'])->label('');
                    ?>
                </div>
                <div class = 'col-md-2 ' >
                    <button type = 'submit' class = 'btn btn-success' style = ' width : 100% ; margin: 25% 5%'>
                        Gráfico
                    </button>
                </div>
                <?php
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
    <?php
// echo $this->render('_search', ['model' => $searchModel]); 
    $columnData = [['class' => 'yii\grid\SerialColumn'],
//                    'perpu_id',
        //          'reporta_a',
        //         'autor',
        //       'historia:ntext',
        //     'modificacion',
        //'estad_id',
        //'perpu_nombre',
       // 'perpu_complemento',
            //'estor_id',
            //'perpu_genero',
            //'perpu_estado_civil',
            //'perpu_edad_minima',
            //'perpu_edad_maxima',
            //'perpu_expe_interna',
            //'perpu_expe_externa',
            //'perpu_expe_especialidad',
            //'perpu_escolaridad',
            //'perpu_objetivo',
            'perpu_nombre_completo',
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
