<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use kartik\date\DatePicker;
use app\models\Variables;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PermisoLaboral */
/* @var $form yii\widgets\ActiveForm */

$name = "'PermisoLaboral[perla_tipo]'";
/*
$this->registerJs("
$('#capturaDias').css('display','none');
var rad = radios = document.getElementsByName($name); 
    var prev = 'horas';
    for(var i = 0; i < rad.length; i++) {
        rad[i].onclick = function() {
            console.log(this.value );
            if(this.value === 'horas') 
            { $('#capturaDias').css('display','none');
             $('#capturaHoras').css('display','block');  }
             else
            { $('#capturaDias').css('display','block');
             $('#capturaHoras').css('display','none');  }             
        };
   
         "
);
 * 
 *  
 */
?>

<div class="permiso-laboral-form row"  style="margin-top: 40px">
    <div class="col-md-9 col-md-offset-2">
        <?php
        $lista = [];
        $form = ActiveForm::begin();

        $col1 = $form->field($model, 'perla_tipo')->radioList(['horas' => 'horas', 'dias' => 'dias'], ['id' => 'tipoPermiso']);
        $this->twoCols($col1, '');
        ?>
        <div id="capturaHoras">
            <?php
            $col1 = $form->field($model, 'perla_dia_inicial')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'El dia...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);
            $col2 = $form->field($model, 'perla_hora_inicial')->widget(TimePicker::classname(),
                    ['pluginOptions' => [ 'showMeridian'=>false]]);
            $col3 = $form->field($model, 'perla_hora_final')->widget(TimePicker::classname(),
                    ['pluginOptions' => [ 'showMeridian'=>false]]);
            $this->threeCols($col1, $col2, $col3);
            ?>
        </div>
        <div id="capturaDias"  style="display:none">
            <?php
            $c1 = $form->field($model, 'dia1')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Del dia...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);

            $c2 = $form->field($model, 'dia2')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Al dia...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);
            $this->twoCols($c1, $c2);
            ?>
        </div>
        <?php
        $elementos = Variables::findAll(['varia_tabla' => 'permiso_laboral', 'varia_campo' => 'perla_asunto']);
        $items = ArrayHelper::map($elementos, 'varia_id', 'varia_cadena');
        $col1 = $form->field($model, 'perla_asunto')->dropDownList($items, ['prompt' => 'asunto...']);
        $col2 = $form->field($model, 'perla_observaciones')->textArea();
        //$lista[] = 'perla_observaciones';
        $this->twoCols($col1, $col2, 4, 6, 1,1);
        $this->finishForm($model);
        ActiveForm::end();
        ?>    
      
    </div>
</div>