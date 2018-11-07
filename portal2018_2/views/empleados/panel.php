<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\Vempleados;
use app\models\Usuarios;
use app\models\PermisoLaboralSearch;
use app\models\PermisoLaboral;
use app\models\AutorizacionesSearch;
use app\models\Autorizaciones;
use yii\grid\GridView;
use yii\web\NotFoundHttpException;
use app\models\Empleados;
use yii\widgets\ActiveForm;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$this->HeaderView($model, $this->title, 'Empleado', $this->context->ifcan('update', $model), $this->context->ifcan('delete', $model));
$m = Vempleados::find()->where(['emple_id' => $model->emple_id])->one();
?>
<div id ='gridPanel'>
    <?php
    $esJefe = Empleados::find()->where(['emple_jefe' => $model->emple_id])->one();
    if ($esJefe) {
        ?>
        <div id =  'col2'> 
            <?php
            
            $searchModel = new AutorizacionesSearch();
            $dataProvider = $searchModel->search(NULL);
            $dataProvider->query->andWhere(['autor_autoriza' => yii::$app->user->identity->getId()]);
            $c2 = ['perla.perla_dia_inicial', 'perla.emple.perso.perso_nombre', 'perla.estad.varia_cadena'
            ];
            $this->glyphicon_extra = $this->glyphicon_ok;

            $this->accion_extra = 'autorizaAcc';
            $this->title_extra = 'Autoriza';
            //$titulo, $nombreClase, $idMaster, $hijos, $dataCols, $letreroAgregar = '', $accion = 'add', $delete = true, $edit = true, $ver = true, $extra = ''
            $this->despliegaDetalle
                    ('Autorizaciones', 'autorizaciones', $model->emple_id, $dataProvider, $c2, '', '', false, false, false, 'prueba'
            );
            ?>
        </div> <!--col2 -->     
    <?php } ?>
    <div id =  'col2'> 
        <div class = "change-login-form">
            <?php
            $usr = null; //Usuarios::find()->where(['usuar_relacion_id' => $model->emple_id])->one();
            $lista = [];
            $form = null;
            $lista[] = ['raw',
                "  <input id='usuarios-usuar_clave' class='form-control' name='Usuarios[usuar_clave]'  "
                . "  value='' aria-required='true' aria-invalid='false' type='password'>"];
            $lista[] = '';
            $lista[] = ['raw', "  
                
            <button type='submit' class='btn btn-success' style= 'width : 100%' id= 'btnCambiaClave'>
                Cambiar clave
            </button>"];
            $this->fTwocols($this, $form, $usr, $lista);
            ?>    

        </div>


    </div> <!--col2 -->     


</div>  <!--grid -->
