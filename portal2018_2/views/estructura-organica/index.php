<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EstructuraOrganica;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstructuraOrganicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estructura Organicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estructura-organica-index">

    <?php
    echo $this->HeaderIndex($this->title, $this->context->ifcan('create') ?
                    'Crear EstructuraOrganica ' : '');
    $estructuras = EstructuraOrganica::find()->all();
    $itemsEstructuras = ArrayHelper::map($estructuras, 'estor_id', 'estor_nombre');

    $form = ActiveForm::begin(['action' => ['chart']]);
    ?>
    <div class ="row" >
        <div class="col-md-6 col-md-offset-6"  style="margin-top: 20px; border: 2px solid darkblue; border-radius: 20px">
            <div class="row">
                <div class = 'col-md-10 ' >
                    <?php
                    echo $form->field($model, 'estor_id')->dropDownList($itemsEstructuras, ['prompt' => 'Elemento Inicial']);
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
    $columnData = [['class' => 'yii\grid\SerialColumn'],
//                    'estor_id',
//            'autor',
//        'modificacion',
        /*
          [
          'attribute' => 'autor0',
          'value' => 'autor0.perso_nombre'
          ],

         * //            'estad_id',
         */
        'estor_nombre_completo',
        //'estor_objetivo',
        //'estor_tipo_estructura',
        //'estco_id',
        //'estor_superior',
        /*
          'estad',
          'estorTipoEstructura',
          'estco',
          'estorSuperior'
         */

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
