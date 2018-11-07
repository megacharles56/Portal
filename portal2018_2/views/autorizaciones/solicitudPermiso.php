<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PermisoLaboral;
use app\models\Empleados;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\Autorizaciones */
?>



<table width="100%">
    <tr>
        <td class="spLogo col-md-3">
            <img src="img/camara.png" alt="<?php echo getcwd(); ?>"/>
        </td>
        <td class="spTitulo col-md-5 col-lg-offset-4"   style="font-size: 1.5em;
            font-weight: bold;
            text-align: left;" align="right"  >
            Solicitud de Permiso
        </td>
    </tr>
</table>


<div align="center" style= "margin-top: 10px; margin-bottom: 20px; border-radius: 50%; width: 100%; height: 7px; background: linear-gradient( to left, #005a9c, white)"></div>

<div    >
    <table width="100%" style="font-size: 1.20em" >
        <tr>
            <td width="70%" > 
                A  <span style="text-decoration: underline">&nbsp;&nbsp; ADMINISTRACIÓN DE PERSONAL &nbsp;&nbsp;</span>
            </td>
            <td width="30%" style="text-align: left" >
                Fecha <span
                    style="text-decoration: underline">&nbsp;&nbsp; <?php  echo date("m.d.y", strtotime($permiso->modificacion));
                    //echo strtotime( $permiso->modificacion);?>&nbsp;&nbsp; </span>
            </td>
        </tr>
    </table>


    <table width="100%"  style="font-size: 1.20em">
        <tr>
            <td width="80%" > 
                Departamento : <span style="text-decoration: underline">&nbsp;&nbsp; <?= $permiso->emple->perpu->estor->estor_nombre ?></span>
            </td>
            <td width="20%"  >
                Folio  <span
                    style="text-decoration: underline"><?= $permiso->perla_id; ?> </span>
            </td>
        </tr>
    </table>

    <table width="100%" style="font-size: 1.20em">
        <tr>
            <td width="70%" > 
                Nombre : <span style="text-decoration: underline">&nbsp;&nbsp; <?= $permiso->emple->perso->perso_nombre; ?> &nbsp;&nbsp;</span>
            </td>
            <td width="30%" style="text-align: left" >
                No de empleado<span
                    style="text-decoration: underline">&nbsp;&nbsp;<?= $permiso->emple->emple_num_nomina ?> &nbsp;&nbsp; </span>
            </td>
        </tr>
    </table>


    <p style="font-size: 1.20em  ;  padding-bottom:  0; margin-bottom: 0  ">Solicito ausentarme :</p>

    <?php
    if ($permiso->perla_tipo == 'dias') {
        ?>
        ')
        <table width="100%" style="font-size: 1.20em">
            <tr>
                <td width="50%" > 
                    del día  <span style="text-decoration: underline">&nbsp;&nbsp; <?= $permiso->perla_dia_inicial ?> &nbsp;&nbsp;</span>
                </td>
                <td width="50%" style="text-align: left" >
                    al dia <span
                        style="text-decoration: underline">&nbsp;&nbsp;  <?= $permiso->perla_dia_final; ?>&nbsp;&nbsp; </span>
                </td>
            </tr>
        </table>

        <?php
    } else {
        ?>
        <div style="width: 60%; margin-left: 25%; padding-top : 0; margin-top: 0">
            <p style="font-size: 1.20em  ;  padding-top:  0; margin-top: 0;  padding-bottom:  0; margin-bottom: 0  ">el dia 
                <span style="text-decoration: underline">&nbsp;&nbsp; <?= $permiso->perla_dia_inicial; ?> &nbsp;&nbsp;</span>
            </p>
            <table width="100%" style="font-size: 1.2em">
                <tr>
                    <td width="50%" > 
                        De las: <span style="text-decoration: underline">&nbsp;&nbsp; <?= $permiso->perla_hora_inicial; ?> &nbsp;&nbsp;</span>
                    </td>
                    <td width="50%" style="text-align: left" >
                        a las <span
                            style="text-decoration: underline">&nbsp;&nbsp; <?= $permiso->perla_hora_final; ?> &nbsp;&nbsp; </span>
                    </td>
                </tr>
            </table>
        <?php } ?>
    </div>    
    <br /><br />

    <table width="100%" style="font-size: 1.2em">   
        <tr>
            <td width="30%"  td style="vertical-align:top"> 
                Asunto: <p><span style="text-decoration: underline">&nbsp;&nbsp; <?= $permiso->perlaAsunto->varia_cadena; ?> &nbsp;&nbsp;</span></p>
            </td>
            <td width="70%" style="text-align: left" >
                <p>Observaciones:</p> 
                <p><?= $permiso->perla_observaciones; ?>  </p>
            </td>
        </tr>
    </table>    

    <?php
    $firma1 = '----';
    $firma2 = '----';
    if ($permiso->perla_firmante_1) {
        $u_firmante1 = usuarios::find()->where(['usuar_id' => $permiso->perla_firmante_1])->one();
        $firmante1 = Empleados::find()->where(['emple_id' =>$u_firmante1->usuar_relacion_id])->one();
        $firma1 = $firmante1->perso->perso_nombre;
    }
    if ($permiso->perla_firmante_2) {
        $u_firmante2 = usuarios::find()->where(['usuar_id' => $permiso->perla_firmante_2])->one();
        $firmante2 = Empleados::find()->where(['emple_id' =>$u_firmante2->usuar_relacion_id])->one();
        $firma2 = $firmante2->perso->perso_nombre;
    }
    ?>
    <br /> <br />
    <table width="90%" style="font-size: 0.9em; text-align: center" align="center" >
        <tr>
            <td width="29%"  td style="vertical-align:top; border-bottom: 2px solid black"> 
                <span >&nbsp;&nbsp; <?= $firma2; ?> &nbsp;&nbsp;</span><br> 
            </td>
            <td width="6%"  td style="vertical-align:top"> </td>
            <td width="29%" style=" border-bottom: 2px solid black" >
                <span >&nbsp;&nbsp; <?=  $firma1; ?> &nbsp;&nbsp;</span><br>
            </td>
            <td width="6%"  td style="vertical-align:top"> </td>
            <td width="29%" style="border-bottom: 2px solid black" >
                <span >&nbsp;&nbsp; <?= $actores['RH']['name'] ?> &nbsp;&nbsp;</span><br>
            </td>                       
        </tr>



        <tr>
            <td width="29%"  td style="vertical-align:top; "> 

                <span style="font-size: 0.6em ; font-style: italic; "> Jefe</span> 
            </td>
            <td width="6%"  td style="vertical-align:top"> </td>
            <td width="29%"  >
                <span style="font-size: 0.6em ; font-style: italic"> Vo. Bo. Director de Área</span>
            </td>
            <td width="6%"  td style="vertical-align:top"> </td>
            <td width="29%"  >
                <span style="font-size: 0.6em; font-style: italic"> Recibido por Administración de personal</span>

            </td>                       
        </tr>


        $actores

    </table>    



