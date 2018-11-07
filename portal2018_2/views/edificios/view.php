<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PisosSearch;
use app\models\Pisos;

/* @var $this yii\web\View */
/* @var $model app\models\Edificios */

$this->title = $model->edifi_id;
$this->params['breadcrumbs'][] = ['label' => 'Edificios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edificios-view">

     
 <?php  
  $this->HeaderView($model,  $this->title, 'Edificios', 
            $this->context->ifcan('update', $model), 
            $this->context->ifcan('delete', $model)); 
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
                'edifi_id',
            'edifi_nombre',
    ],
    ]) ?>

        <div id = 'col1' style="width: 50%; margin: 0 auto"> 
            <?php
            $searchModel = new PisosSearch();
            $dataProvider = $searchModel->search(NULL);
            $dataProvider->query->andWhere(['edifi_id' => $model->edifi_id]);
            $this->despliegaDetalle
                    ('Pisos', 'pisos', $model->edifi_id, $dataProvider, ['piso_nombre'], 
                        'agrega', 'add', true, true, true);
            ?>        
        </div>
    
    
    
</div>
