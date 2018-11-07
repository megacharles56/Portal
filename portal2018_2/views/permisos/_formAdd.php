<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Clases;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Permisos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permisos-form">
    <?php  
    $clases = Clases::find()->all();
    $items = ArrayHelper::map($clases,'clase_id', 'clase_clase');
    
    $lista = [];
    $form = ActiveForm::begin();
    $lista[] =  ['dropDownList', 'clase_id', $items, 'seleccione la clase'];
    $lista[] = 'permi_metodo';
    $lista[] = 'permi_campo';
    $lista[] = 'permi_nivel';
    
    $this->fTwocols($this, $form, $model, $lista);
    $this->finishForm($model, 'empoleados', $model->emple_id);
    ActiveForm::end();
    ?>
</div>
