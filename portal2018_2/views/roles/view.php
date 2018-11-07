<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\RolPermisosSearch;
use app\models\RolPermisos;
use app\models\Permisos;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\RolMenu;
use app\models\RolMenuSearch;

$this->registerJs(
        "
var options = {    
    filterTextClear    : 'Quitar filtro',
    filterPlaceHolder  : 'Filtro',
    moveSelectedLabel  : 'Mover Seleccionados',
    moveAllLabel       : 'mover todos',
    removeSelectedLabel: 'Quitar seleccionados',
    removeAllLabel     : 'Quitar todos',
    moveOnSelect       : false,
    infoText 	       : 'Mostrando los {0}',
    infoTextFiltered   : '<span class=" . ' "label label-warning" ' . ">Filtrado</span> {0} de {1}',
    infoTextEmpty      : 'lista vacia'
};

var demo1 = $(  
        'select[name=" . '"duallistbox[]"' . "]').bootstrapDualListbox( options );
");


/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = $model->rol_id;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-view">

    <?php
    $this->HeaderView($model, $this->title, 'Roles', $this->context->ifcan('update', $model));
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rol_id',
            'rol_nombre',
        ],
    ]);
    ?>
    <div class="row">
        <div class ="col-md-2">
            <h2>Permisos</h2>
        </div>
        <div class="col-md-9 ">            
            <?php
            $actuales = RolPermisos::findAll(["rol_id" => "$model->rol_id"]);
            $permisos = Permisos::find(["permi_id>0"])->all();

            $form = ActiveForm::begin(['action' => Url::to(['roles/permisos'])]);
            echo $form->field($model, 'rol_id')->hiddenInput()->label(false);
            ?>

            <select multiple='multiple' size='10' name='duallistbox[]' class="form-control">
                <?php
                foreach ($permisos as $p) {
                    $id = $p->permi_id;
                    $clase = str_pad($p->clase->clase_clase, 12);
                    $metodo = str_pad($p->permi_metodo, 12);
                    $campo = str_pad($p->permi_campo, 12);
                    $nivel = str_pad($p->permi_nivel, 3);
                    $elemento = $clase . ' - ' . $metodo . ' - ' . $campo . ' - ' . $nivel;
                    $incluido = false;
                    foreach ($actuales as $a) {
                        $incluido = ($incluido) || ($id == $a->permi_id);
                    }
                    $selected = $incluido ? "selected = 'selected'" : "";
                    echo "<option value='$id' $selected>$elemento</option>\n";
                }
                ?>      
            </select>
            <br>

            <button type = 'submit' class = 'btn btn-success' style = ' width : 100%'>
                Modificar
            </button>

            <?php
            ActiveForm::end();
            ?>
        </div>
    </div>
<br /> <br />
    <div class="row">
        <div class ="col-md-2">
            <h2>Menúes</h2>
        </div>
        <div class="col-md-9 "> 

            <?php
            $searchModel = new RolMenuSearch();
            $dataProvider = $searchModel->search(NULL);
            $dataProvider->query->andWhere(['rol_id' => $model->rol_id]);
            $c2 = ['rolme_label', 'rolme_url'];
            $this->despliegaDetalle
                    ('', 'rol-menu', $model->rol_id, $dataProvider, 
                    $c2, 'Agregrar', 'add', true, true, true
            );
            ?>


        </div>
    </div>
</div>    