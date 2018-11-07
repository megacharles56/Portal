<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\UsuarRolSearch;

use app\models\Vempleados;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->usuar_id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-view">


    <?php

    $this->HeaderView($model, $this->title, 'Usuarios', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            //     'usuar_id',
            'usuar_usuario',
            'usuar_nombre',
            'usuar_clave',
            'usuar_correo_1',
            'usuar_correo_2',
            'usuar_tel_1',
            'usuar_tel_2',
            'usuar_ext_1',
            'usuar_ext_2',
            'usuar_relacion_id',
            'usuar_relacion_nombre',
        ],
    ]);

    $columnData = [['class' => 'yii\grid\SerialColumn'],
        'usrol_id',
        'usrol_usuar_id',
        'usrol_rol_id',
    ];



        $searchModel = new UsuarRolSearch();
    $searchModel->usuar_id = $model->usuar_id;

    $dataProvider = $searchModel->search([]);
    ?>
    <div class=" row">
        <div class="col-md-7 col-md-offset-5">
            <?php
            echo
            $this->despliegaDetalle
                    ('Roles', 'usuar-rol', $model->usuar_id, $dataProvider, ['rol.rol_nombre'], 'Agregar Rol ', $accion = 'add', true, false, false
            );
            ?>
        </div>
    </div>
</div>
