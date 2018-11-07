<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use app\models\Personas;
use app\models\PerpuHabilidadSearch;
use app\models\PerpuFormacionSearch;
use app\models\PerpuFuncionesSearch;
use app\models\PpRelacionesExtSearch;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilesPuesto */

$this->title = $model->perpu_id;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-puesto-view">


    <?php
    $this->HeaderView($model, $this->title, 'PerfilesPuesto', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));

    /*
      'perpu_id',                   'reporta_a',           'autor',
      'historia:ntext',             'modificacion',        'estad_id',
      'perpu_nombre',               'perpu_complemento',   'estor_id',
      'perpu_genero',               'perpu_estado_civil',  'perpu_edad_minima',
      'perpu_edad_maxima',          'perpu_expe_interna',  'perpu_expe_externa',
      'perpu_expe_especialidad',    'perpu_escolaridad',   'perpu_objetivo',
      'perpu_nombre_completo',
     */

    echo DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'buttons1' => '',
        'panel' => [
            'heading' => 'Perfil de puesto <span style="color: blue">' . $model->perpu_nombre_completo . '</span>',
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
            ['columns' => [
                    ['attribute' => 'autor0',
                        'value' => $model->autor0->perso_nombre,
                        'label' => 'Autor',
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    ['attribute' => 'modificacion',
                        'value' => $model->modificacion,
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    ['attribute' => 'estad',
                        'value' => $model->estad->varia_cadena,
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                ],
            ],
            ['columns' => [
                    [
                        'attribute' => 'estor',
                        'value' => $model->estor->estorTipoEstructura->varia_cadena . ' ' . $model->estor->estor_nombre,
                        'label' => 'Estructura Orgánica',
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    [
                        'attribute' => 'reportaA',
                        'value' => $model->reportaA ? $model->reportaA->perpu_nombre_completo : '--',
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                ],],
            ['columns' => [
                    [
                        'attribute' => 'perpuGenero',
                        'value' => $model->perpuGenero->varia_cadena,
                        'label' => 'Genero',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:15%']
                    ],
                    [
                        'attribute' => 'perpuEstadoCivil',
                        'label' => 'Estado Civil',
                        'value' => $model->perpuEstadoCivil->varia_cadena,
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:15%']],
                    [
                        'attribute' => 'perpu_escolaridad',
                        'label' => 'Escolaridad',
                        'value' => $model->perpuEscolaridad ? $model->perpuEscolaridad->varia_cadena : '--',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:15%']],
                    [
                        'attribute' => 'perpu_escolaridad_especialidad',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:15%']],
                ],],
            ['columns' => [
                    [
                        'attribute' => 'perpu_edad_minima',
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'perpu_edad_maxima',
                    ],
                ],],
            [
                'group' => true,
                'label' => 'Experiencia',
                'rowOptions' => ['class' => 'info'],
            ],
            ['columns' => [
                    [
                        'attribute' => 'perpu_expe_interna',
                        'label' => 'Interna',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:10%']
                    ],
                    [
                        'attribute' => 'perpu_expe_externa',
                        'label' => 'Externa',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:10%']
                    ],
                    [
                        'attribute' => 'perpu_expe_especialidad',
                        'label' => 'Especialidad',
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                ],],
            'perpu_objetivo',
        //'historia:ntext',
        ]
    ]);
    /*
      public function despliegaDetalle
      ($titulo, $nombreClase, $idMaster, $hijos, $dataCols, $letreroAgregar = '', $accion = 'add', $delete = true, $edit = true, $ver = true
      )


     */
    ?>

    <div id ='gridUno'>
        <div id = 'col1'> 
            <?php
            $searchModel = new PerpuFormacionSearch();
            $dataProvider = $searchModel->search(NULL);
            $dataProvider->query->andWhere(['perpu_id' => $model->perpu_id]);
            $this->despliegaDetalle
                    ('Formación', 'perpu-formacion', $model->perpu_id, $dataProvider, ['pform_curso'], 
                        'agrega', 'add', true, true, true);
            ?>        
        </div>
        <div>
            <?php
            $searchModel = new PerpuHabilidadSearch();
            $dataProvider = $searchModel->search(NULL);
            $dataProvider->query->andWhere(['perpu_id' => $model->perpu_id]);
            $this->despliegaDetalle
                    ('Habilidades', 'perpu-habilidad', $model->perpu_id, $dataProvider, ['phabi_habilidad'], 
                        'agrega', 'add', true, true, true);
            ?>        
        </div>

        <div id = 'col1'> 
            <?php
            $searchModel = new PerpuFuncionesSearch();
            $dataProvider = $searchModel->search(NULL);
            $dataProvider->query->andWhere(['perpu_id' => $model->perpu_id]);
            $this->despliegaDetalle
                    ('Funciones', 'perpu-funciones', $model->perpu_id, $dataProvider, ['pfunc_funcion'], 
                        'agrega', 'add', true, true, true);
            ?>        
        </div>
        <div>
            <?php
            $searchModel = new PpRelacionesExtSearch();
            $dataProvider = $searchModel->search(NULL);
            $dataProvider->query->andWhere(['perpu_id' => $model->perpu_id]);
            $this->despliegaDetalle
                    ('Relaciones Externas', 'pp-relaciones-ext', $model->perpu_id, $dataProvider, ['prele_relacion'], 
                        'Agrega', 'add', true, true, true);
            ?>        
        </div>
        
        
        
    </div>
