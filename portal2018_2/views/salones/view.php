<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\SalonesLigadosSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Salones */

$this->title = $model->salon_id;
$this->params['breadcrumbs'][] = ['label' => 'Salones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salones-view">


    <?php
    $this->HeaderView($model, $this->title, 'Salones', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'salon_id',
            'salon_nombre',
            'salon_ubicacion',
        ],
    ]);
    ?>
    <div class ='row'>
        <div class='col-md-6 col-md-offset-3'>
    <?php
    $searchModel = new SalonesLigadosSearch();
    $dataProvider = $searchModel->search(NULL);
    $dataProvider->query->andWhere(['salon_id' => $model->salon_id]);
    $c2 = ['saligSalonLigado.salon_nombre',];
    $this->despliegaDetalle
            ('', 'salones-ligados', $model->salon_id, $dataProvider, $c2, 'Agregrar', 'add', false, false, true
    );
    ?>
        </div>
    </div>
</div>
