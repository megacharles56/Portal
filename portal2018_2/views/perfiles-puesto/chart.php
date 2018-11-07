<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
USE app\models\VperfilesPuesto;

$this->registerCss("
    .orgchart { background: #fff; }
    .orgchart td.left, .orgchart td.right, .orgchart td.top { border-color: #aaa; }
    .orgchart td>.down { background-color: #aaa; }
    .orgchart .node .title {font-size: .6em}
  
    .orgchart .level-1-1 .title { background-color: red; }
    .orgchart .level-1-2 .title { background-color: red; }
    .orgchart .level-1-3 .title { background-color: red;  }
    .orgchart .level-1-1 .content { border-color: red }
    .orgchart .level-1-2 .content { border-color: red; height: 3.5em }
    .orgchart .level-1-3 .content { border-color: red; height: 5em }

    .orgchart .level-2-1 .title { background-color: lightBlue; }
    .orgchart .level-2-2 .title { background-color: lightBlue; }
    .orgchart .level-2-3 .title { background-color: lightBlue; }
    .orgchart .level-2-1 .content { border-color: lightBlue }
    .orgchart .level-2-2 .content { border-color: lightBlue; height: 3.5em }
    .orgchart .level-2-3 .content { border-color: lightBlue; height: 5em }

    .orgchart .level-3-1 .title { background-color: #6600cc; }
    .orgchart .level-3-2 .title { background-color: #6600cc; }
    .orgchart .level-3-3 .title { background-color: #6600cc; }
    .orgchart .level-3-1 .content { border-color: #6600cc }
    .orgchart .level-3-2 .content { border-color: #6600cc; height: 3.5em }
    .orgchart .level-3-3 .content { border-color: #6600cc; height: 5em }

    .orgchart .level-4-1 .title { background-color: lightgreen; }
    .orgchart .level-4-2 .title { background-color: lightgreen; }
    .orgchart .level-4-3 .title { background-color: lightgreen; }
    .orgchart .level-4-1 .content { border-color: lightgreen }
    .orgchart .level-4-2 .content { border-color: lightgreen; height: 3.5em }
    .orgchart .level-4-3 .content { border-color: lightgreen; height: 5em }
");

function getLevelInfoJ($anterior, &$nivel) {
    $nivel = VperfilesPuesto::findAll((['reporta_a' => $anterior->perpu_id]));
}

function getelement($niv, $depth) {
    ++$depth;
    $name = $niv->perpu_nombre; 
    $title = wordwrap($niv->perpu_complemento, 15, '<br />');
    $class = "level-$depth-" . (substr_count($title, '<br />') + 1);
    return "{ 'name': '$name','title': '$title',  'className': '$class' ";
}

$nivel0 = VperfilesPuesto::findOne(['perpu_id' => $perpu_id]);

$datos = getelement($nivel0, 0);

getLevelInfoJ($nivel0, $nivel1);
$n1 = sizeof($nivel1);
if ($n1 > 0) {
    $i1 = 1;
    $datos .= ", 'children': [ ";
    foreach ($nivel1 as $niv1) {
        $datos .= getelement($niv1, 1);  //"{ 'name': '$niv1->tipo_estructura','title': '$niv1->estor_nombre' ";

        getLevelInfoJ($niv1, $nivel2);
        $n2 = sizeof($nivel2);
        if ($n2 > 0) {
            $i2 = 1;
            $datos .= ", 'children': [ ";
            foreach ($nivel2 as $niv2) {
                $datos .= getelement($niv2, 2); // "{ 'name': '$niv2->tipo_estructura', 'title': '$niv2->estor_nombre' ";
                getLevelInfoJ($niv2, $nivel3);
                $n3 = sizeof($nivel3);
                if ($n3 > 0) {
                    $i3 = 1;
                    $datos .= ", 'children': [ ";
                    foreach ($nivel3 as $niv3) {
                        //$datos .= "{ 'name': '$niv3->tipo_estructura', 'title': '$niv3->estor_nombre' ";
                        $datos .= getelement($niv3, 3);
                        getLevelInfoJ($niv3, $nivel4);
                        $n4 = sizeof($nivel4);
                        if ($n4 > 0) {
                            $i4 = 1;
                            $datos .= ", 'children': [ ";
                            foreach ($nivel4 as $niv4) {
                                $datos .= getelement($niv4, 4);
                                //" { 'name': '$niv4->tipo_estructura', 'title': '$niv4->estor_nombre' ";
                                $datos .= '} ';
                                if ($i4 < $n4)
                                    $datos .= ', ';
                                if ($i4 == $n4)
                                    $datos .= '] ';
                                $i4++;
                            }
                        }
                        $datos .= '} ';
                        if ($i3 < $n3)
                            $datos .= ', ';
                        if ($i3 == $n3)
                            $datos .= '] ';
                        $i3++;
                    }
                }
                $datos .= '} ';
                if ($i2 < $n2)
                    $datos .= ', ';
                if ($i2 == $n2)
                    $datos .= '] ';
                $i2++;
            }
        }
        $datos .= '} ';
        if ($i1 < $n1)
            $datos .= ', ';
        if ($i1 == $n1)
            $datos .= '] ';
        $i1++;
    }
    $datos .= "}";
}

//echo $datos;

$this->registerJs("
$(function() {
var datasource = $datos;

$('#chart-container').orgchart({
   'data' : datasource,
   'nodeContent': 'title',
   'pan': true,
   'zoom': true
   });
});
");

$nombreHClase = "Perfil de Puesto";

echo "<div class = 'row align-bottom' >";
echo "     <div class = 'col-md-6' >";
if ($nombreHClase <> '') {
    echo "<h2 style='display: inline-block'>$nombreHClase </h2 > : "
    . "<h3 style = 'display: inline-block; margin-left: 5px'>";
    // echo Html::encode(' ' . $title);
    echo "</h3>";
}
echo " </div>";

echo Html::a('Admistracion', ['index'], ['class' => 'btn btn-info']);
echo '</div>';

echo '<br>';
?>

<div id="chart-container" style ="border : darkblue 2px solid; border-radius: 10px"></div>


<hr>
