<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Eventos */

$this->title = $model->event_id;
$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventos-view">


    <?php
    if (!Yii::$app->user->isGuest)
        $this->HeaderView($model, $this->title, 'Eventos', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));

    echo DetailView::widget([
        'model' => $model, 'condensed' => true, 'hover' => true,
        'mode' => DetailView::MODE_VIEW, 'buttons1' => '',
        'panel' => [
            'heading' => ' <span style="color: blue">' . $model->event_evento
            ,
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
            ['columns' => [
                    ['attribute' => 'estad',
                        'label' => 'Estado',
                        'value' => $model->estad->varia_cadena,
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    ['attribute' => 'autor0',
                        'label' => 'Autor',
                        'value' => $model->autor0->perso_nombre,
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    ['attribute' => 'modificacion',
                        'label' => 'Modificación',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                ],
            ],
            ['columns' => [
                    ['attribute' => 'event_fecha',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    ['attribute' => 'event_inicio',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    ['attribute' => 'event_fin',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                ],
            ],
            ['columns' => [
                    ['attribute' => 'salon',
                        'label' => 'Salon',
                        'value' => $model->salon->salon_nombre,
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    [//'attribute' => 'eventServicio',
                        'value' => $model->eventServicio ? $model->eventServicio->varia_cadena : '--',
                        'label' => 'Servicio',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    [//'attribute' => 'eventServicio',
                        'value' => $model->eventAcomodo ? $model->eventAcomodo->varia_cadena : '--',
                        'label' => 'Acomodo',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                ],
            ],
            ['columns' => [
                    ['attribute' => 'event_pax',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                        'options' => ['style' => 'width:50%'],
                    ],
                    ['attribute' => 'event_pagado',
                        'value' => $model->event_pagado,
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                ],
            ],
            ['columns' => [
                    ['attribute' => 'event_menu',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                        'options' => ['style' => 'width:50%'],
                    ],
                    ['attribute' => 'event_observaciones',
                        'value' => $model->event_pagado,
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                ],
            ],
            [
                'group' => true,
                'label' => 'Responsabilidad',
                'rowOptions' => ['class' => 'info'],
            ],
            ['columns' => [
                    ['attribute' => 'estor',
                        'label' => 'Área',
                        'value' => $model->estor ? $model->estor->estorTipoEstructura->varia_cadena .
                                ' ' . $model->estor->estor_nombre : '--',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    [//'attribute' => 'eventServicio',
                        'value' => $model->emple ? $model->emple->perso->perso_nombre : '--',
                        'label' => 'Personal Canaco',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                    [//'attribute' => 'eventServicio',
                        'value' => $model->event_responsable,
                        'label' => 'Otro',
                        'valueColOptions' => ['style' => 'width:25%'],
                        'labelColOptions' => ['style' => 'width:10%'],
                    ],
                ],
            ],
        ],
    ]);
    ?>

</div>


