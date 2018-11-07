<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Vempleados;
use yii\helpers\ArrayHelper;  //#Mmercadotecnia2018
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpleadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-index">

    <?php
  //  echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
  //                  'Crear Empleados ' : '');
    $style = '100px; ';
    $btn = Html::a('Carga Empleado', ['add'], ['class' => "btn btn-success ", 'style' => $style]);
    echo $btn;
/*
    $btn = Html::a('Capture Empleado', ['capture'], ['class' => "btn btn-success ", 'style' => $style]);
    echo $btn;
*/
    $empleados = Vempleados::find()->all();
    $itemsEmpleados = ArrayHelper::map($empleados, 'emple_id', 'perso_nombre');

    $form = ActiveForm::begin(['action' => ['chart']]);
    ?>
    <div class ="row" >
        <div class="col-md-6 col-md-offset-6"  style="margin-top: 2px; border: 2px solid darkblue; border-radius: 20px">
            <div class="row">
                <div class = 'col-md-10 ' >
                    <?php
                    echo $form->field($model, 'emple_id')->dropDownList($itemsEmpleados, ['prompt' => 'Elemento Inicial']);
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

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?php
    $columnData = [['class' => 'yii\grid\SerialColumn'],
//                    'emple_id',
//            'autor',
//            'historia:ntext',
//            'modificacion',
//            'estad_id',
        //'perso_id',
        'emple_num_nomina',
        //'perpu_id',
        //'emple_horario',
        //'emple_jornada_laboral',
        //'emple_descanso_semanal',
        //'emple_lugar_trabajo',
        //'emple_terminacion_contrato',
        //'emple_jefe',semplead
        //'emple_usuario',
        //'emple_clave_sistemas',
        'perso_nombre',
        'estor_nombre_completo',
        'usuar_ext_1',
//        'emple_tel_2',
        'usuar_correo_1',
//        'emple_correo_2',
        
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
