<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Roles;
use app\models\RolMenuSearch;
use yii\grid\GridView;
use app\models\ClasesSearch;

/* @var $this yii\web\View */
/* @var $model app\models\RolMenu */

$this->title = 'agregar Rol Menu';

$this->params['breadcrumbs'][] = ['label' => 'Rol Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-menu-add">

    <div class='row'> 
        <div  class='col-md-2'>
            <h1>   <?= Html::encode($this->title) ?></h1>
        </div>

        <div class="rol-menu-form col-md-9 " > 
            <?php
            $lista = [];
            $form = ActiveForm::begin();
            echo $form->field($model, 'rol_id')->input('hidden')->label(false);
            $lista[] = 'rolme_label';
            $lista[] = 'rolme_url';
            $lista[] = 'rolme_orden';
            $lista[] = 'rolme_tooltip';
            $this->fTwocols($this, $form, $model, $lista);
            $this->finishForm($model);
            ActiveForm::end();
            ?>    
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            Existentes
            <?php
            $searchModel = new RolMenuSearch();
            $dataProvider = $searchModel->search(NULL);
            $dataProvider->query->andWhere(['rol_id' => $model->rol_id]);
            $cols = ['rolme_orden', 'rolme_label', 'rolme_label'];
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => $cols,
                 'tableOptions' =>['class' => 'table table-compact'],                
            ]);
            ?>

        </div>
        <div class="col-md-4 col-md-offset-1">
            Existentes
            <?php
            $searchModel = new ClasesSearch();
            $dataProvider = $searchModel->search(NULL);
            $cols = ['clase_clase'];
            
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => $cols,
                 'tableOptions' =>['class' => 'table table-compact table-stripped'],
            ]);
            ?>
        </div>            
    </div>
</div>
