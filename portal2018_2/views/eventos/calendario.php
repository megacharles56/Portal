<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Captura de fecha a ver */

use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;
use kartik\helpers\Html; // o.O
USE app\models\Variables;
use yii\helpers\ArrayHelper;
use app\models\Salones;
use app\models\Eventos;
?>


<?php
$form = ActiveForm::begin();
echo '<div class="form-group grid_selec_calendario">';
$se = Variables::find()->where(['varia_tabla' => 'SALONES', 'varia_campo' => 'UBICACION'])->all();
$items = ArrayHelper::map($se, 'varia_id', 'varia_cadena');
echo $form->field($calendario, 'fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'El dia...'],
    'pluginOptions' => [
        'autoclose' => true
    ]
]);
echo $form->field($calendario, 'ubicacion')->dropDownList($items, ['prompt' => 'ubicacion']);
echo Html::submitButton('Seleccionar', ['class' => 'btn btn-success', 'style' => 'height:40px; align-self: center;']);
// echo Html::submitButton('Hoy', ['class' => 'btn btn-success']);
ActiveForm::end();
echo '</div>';
?>

<!-- form -->
<div  class="calendario">
    <?php
    $ubicacion = $calendario->ubicacion;
    $fecha = $calendario->fecha;
    $sqlsalones = "select salon_id, salon_nombre from Salones where salon_ubicacion = $ubicacion";
    $salones = Salones::find()->where("salon_ubicacion = $ubicacion")->orderBy('salon_id')->all();

    foreach ($salones as $salon) {
        echo "<div>";
        echo "    <p class='nombre'>";
        echo $salon->salon_nombre;
        echo "    </p>";

        $salon_id = $salon->salon_id;
        $eventos = Eventos::find()->where("Salon_id = $salon_id and event_fecha =  '$fecha'")->orderBy('event_inicio')->all();
        if (sizeof($eventos) > 0) {
            echo "<div >";
            foreach ($eventos as $evento) {
                echo "<div class='calendario_inner'>";
                $class = $evento->estad->varia_cadena;

                echo "<p class='$class'>" . $evento->event_evento . '</p>';
                echo "<p class='horario'>" .$evento->horario. '</p>';
                echo "<p class='estado'>" .$class. '</p>';                
                echo "</div>";
            }
            echo "</div>";
        }

        echo "</div>";
    }
    return;
    ?>
</div>