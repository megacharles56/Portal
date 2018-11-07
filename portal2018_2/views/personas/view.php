<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = $model->perso_id;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-view">


    <?php
    $this->HeaderView($model, $this->title, 'Personas', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'historia:ntext',
            'domic_id',
        ],
    ]);


    echo DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'buttons1' => '',
        'panel' => [
            'heading' => 'Persona <span style="color: blue">' . $model->perso_nombre . '</span>',
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
            ['columns' => [
                    ['attribute' => 'autor0',
                        'value' => $model->autor0 ? $model->autor0->perso_nombre : '--',
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
            /*
              ['columns' => [
              [
              'attribute' => 'perso_nombre1',
              'labelColOptions' => ['style' => 'width:10%'],
              'valueColOptions' => ['style' => 'width:23%'],
              ],
              [
              'attribute' => 'perso_nombre2',
              'labelColOptions' => ['style' => 'width:10%'],
              'valueColOptions' => ['style' => 'width:23%'],
              ],
              [
              'attribute' => 'perso_nombre3',
              'labelColOptions' => ['style' => 'width:10%'],
              'valueColOptions' => ['style' => 'width:23%'],
              ]
              ],],
              ['columns' => [
              [
              'attribute' => 'perso_paterno',
              'labelColOptions' => ['style' => 'width:10%'],
              'valueColOptions' => ['style' => 'width:23%'],
              ],
              [
              'attribute' => 'perso_materno',
              'labelColOptions' => ['style' => 'width:10%'],
              'valueColOptions' => ['style' => 'width:23%'],
              ]
              ],],
             * 
             */
            ['columns' => [
                    [
                        'attribute' => 'perso_sexo',
                        'value' => $model->perso_sexo,
                        'label' => 'Genero',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                    [
                        'attribute' => 'perso_nacionalidad',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                    [
                        'attribute' => 'perso_fecha_nacimiento',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ]
                ],
            ],
            ['columns' => [
                    [
                        'attribute' => 'perso_titulo',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                    [
                        'attribute' => 'perso_sobrenombre',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
            ['columns' => [
                    [
                        'attribute' => 'perso_rfc',
                        'label' => 'RFC',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                    [
                        'attribute' => 'perso_curp',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
    ]]);
    ?>

</div>
