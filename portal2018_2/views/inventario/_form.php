<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inventario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventario-form">
    <?php     $lista = [];
    $form = ActiveForm::begin(); 
    $lista[] = 'artic_id'; 
$lista[] = 'inven_descripcion'; 
$lista[] = 'inven_caracteristica'; 
$lista[] = 'inven_color'; 
$lista[] = 'inven_material'; 
$lista[] = 'inven_marca'; 
$lista[] = 'inven_modelo'; 
$lista[] = 'inven_numero_serie'; 
$lista[] = 'inven_numero_inventario'; 
$lista[] = 'inven_colocacion'; 
$lista[] = 'inven_observaciones'; 
$lista[] = 'inven_estado'; 
$lista[] = 'inven_piso_id'; 
$lista[] = 'inven_emple_id'; 
$lista[] = 'inven_alta'; 
$lista[] = 'inven_actualizacion'; 
$this->fTwocols($this, $form, $model, $lista );

          $this->finishForm($model ); 
 
          ActiveForm::end(); ?>    

</div>
