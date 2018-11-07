<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use kartik\date\DatePicker;
use app\models\Variables;
use yii\helpers\ArrayHelper;
use app\models\Vempleados;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PermisoLaboralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permisos Laborales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permiso-laboral-index">
    <?php echo $this->HeaderIndex($this->title, ''); ?>  
    <div class="permiso-laboral-search" style="margin-top: 40px">
        <div class="col-md-9 col-md-offset-2">
            <?php
            $list = [];
            $activo = Variables::findOne(['varia_tabla' => '*',
                        'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;
            $atencion = Variables::findOne(['varia_tabla' => '*',
                        'varia_campo' => 'ESTADO', 'varia_cadena' => 'EN ATENCION'])->varia_id;
            $denegado = Variables::findOne(['varia_tabla' => '*',
                        'varia_campo' => 'ESTADO', 'varia_cadena' => 'DENEGADO'])->varia_id;
            $autorizado = Variables::findOne(['varia_tabla' => '*',
                        'varia_campo' => 'ESTADO', 'varia_cadena' => 'AUTORIZADO'])->varia_id;
            $solicitado = Variables::findOne(['varia_tabla' => '*',
                        'varia_campo' => 'ESTADO', 'varia_cadena' => 'SOLICITADO'])->varia_id;

            $form = ActiveForm::begin([
                        'action' => ['index'],
                        'method' => 'get',
            ]);
            ?>
            <div id="capturaHoras">
                <?php
                $col1 = $form->field($searchModel, 'perla_dia_inicial')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'El dia...'],
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]);
                $elementos = Vempleados::findAll(['estad_id' => $activo]);
                $items = ArrayHelper::map($elementos, 'emple_id', ('perso_nombre'));
                $col2 = $form->field($searchModel, 'emple_id')->
                        dropDownList($items, ['prompt' => 'empleado...'])
                        ->label('Empleado');
                $this->twoCols($col1, $col2);

                $elementos = Variables::findAll(['varia_tabla' => 'permiso_laboral', 'varia_campo' => 'perla_asunto']);
                $items = ArrayHelper::map($elementos, 'varia_id', 'varia_cadena');
                $col1 = $form->field($searchModel, 'perla_asunto')->dropDownList($items, ['prompt' => 'asunto...']);
                $elementos = Variables::findAll(['varia_tabla' => '*', 'varia_campo' => 'ESTADO']);
                $items = [
                    $activo => 'ACTIVO', $atencion => 'EN ATENCION',
                    $denegado => 'DENEGADO', $autorizado => 'AUTORIZADO',
                    $solicitado => 'SOLICITADO'];
                $col2 = $form->field($searchModel, 'estad_id')->dropDownList($items, ['prompt' => 'Estado...']);
                $this->twoCols($col1, $col2);
                ?>
                <div class="form-group">
                    <?php
                    echo Html::submitButton('Search', ['class' => 'btn btn-primary']);
                    echo Html::resetButton('Reset', ['class' => 'btn btn-default']);
                    ActiveForm::end();
                    ?>
                </div>

            </div>
        </div>
        <?php
        $columnData = [['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'estad',
                'value' => 'estad.varia_cadena'
            ],
            [
                'attribute' => 'perlaAsunto',
                'value' => 'perlaAsunto.varia_cadena'
            ],
            [
                'attribute' => 'emple',
                'value' => 'emple.perso.perso_nombre'
            ],
            'perla_dia_inicial',
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
            //'filterModel' => $searchModel,
            'columns' => $cols
        ]);
        ?>
    </div>
