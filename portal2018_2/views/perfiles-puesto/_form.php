<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Variables;
use app\models\VestructuraOrganica;
use app\models\PerfilesPuesto;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilesPuesto */
/* @var $form yii\widgets\ActiveForm */


$direccionEstructuras = '"' . Yii::$app->urlManager->createUrl('perfiles-puesto/jgeteo') . '"';
$this->registerJs("
 
 $('#perfilespuesto-_tipoestructura').change(
    function(){ estructuras();}                
    )

function estructuras ( ){             
    var d = $('#perfilespuesto-_tipoestructura').serialize();
    alert(d);
    $.ajax(            {'type': 'POST',
                'url': $direccionEstructuras,
                'cache': false,
                'data': d,                            
                'success': function (json){                   
                    resultado = $.parseJSON(json);
                    $('#perfilespuesto-estor_id').html(resultado['s']);
            }
        }
    ); 
    return ;
    }");
?>

<div class="perfiles-puesto-form">
    <?php
    /* busco tipos de estructura */
    $tipoEst = Variables::findAll(['varia_tabla' => 'ESTRUCTURA_ORGANICA', 'varia_campo' => 'ESTOR_TIPO_ESTRUCTURA']);
    $itemsEst = ArrayHelper::map($tipoEst, 'varia_id', 'varia_cadena');
    $lista = [];
    $form = ActiveForm::begin();
    if (!$model->isNewRecord) {
        $elementos = Variables::findAll(['varia_tabla' => '*', 'varia_campo' => 'ESTADO']);
        $items = ArrayHelper::map($elementos, 'varia_id', 'varia_cadena');
        $lista[] = ['dropDownList', 'estad_id', $items, 'seleccione estado'];
        $lista[] = '';
    }
    $lista[] = 'perpu_nombre';
    $lista[] = 'perpu_complemento';
    $elementos = VestructuraOrganica::find()->all();
    $items = ArrayHelper::map($elementos, 'estor_id', 'estor_nombre_completo');
    $lista[] = ['dropDownList', '_tipoEstructura', $itemsEst, 'seleccione tipo de Estructura'];
    $lista[] = ['dropDownList', 'estor_id', $items, 'Estructura '];
    $lista[] = ['textArea', 'perpu_objetivo'];
    $lista[] = '';
    $elementos = Variables::findAll(['varia_tabla' => '*', 'varia_campo' => 'EDUCACION']);
    $items = ArrayHelper::map($elementos, 'varia_id', 'varia_cadena');
    $lista[] = ['dropDownList', 'perpu_escolaridad', $items, 'Educación'];
    $lista[] = 'perpu_escolaridad_especialidad';
    //$lista[] = 'perpu_escolaridad';
    $elementos = Variables::findAll(['varia_tabla' => '*', 'varia_campo' => 'ESTADO CIVIL']);
    $items = ArrayHelper::map($elementos, 'varia_id', 'varia_cadena');
    $lista[] = ['dropDownList', 'perpu_estado_civil', $items, 'Estado Civil'];
    $elementos = Variables::findAll(['varia_tabla' => '*', 'varia_campo' => 'GENERO']);
    $items = ArrayHelper::map($elementos, 'varia_id', 'varia_cadena');
    $lista[] = ['dropDownList', 'perpu_genero', $items, 'genero'];
    $lista[] = 'perpu_edad_minima';
    $lista[] = 'perpu_edad_maxima';
    $lista[] = 'perpu_expe_externa';
    $lista[] = 'perpu_expe_interna';
    $lista[] = 'perpu_expe_especialidad';
    $elementos = PerfilesPuesto::find()->all();
    $items = ArrayHelper::map($elementos, 'perpu_id', 'perpu_nombre_completo');
    $lista[] = ['dropDownList', 'reporta_a', $items, 'Reporta a'];
    $this->fTwocols($this, $form, $model, $lista);
    $this->finishForm($model);

    ActiveForm::end();
    ?>    

</div>
