<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Usuarios;

$this->title = 'Ingreso';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="gridDosCols" >
        <div id="forma_ingreso">
            <p>Llene los campos siguientes para ingresar:</p>

            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                            /*

                              'fieldConfig' => [
                              'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
                              'labelOptions' => ['class' => 'col-lg-1 control-label'],
                              ],
                             * 
                             */
            ]);
            ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>
            <!--
            <?php
            // echo $form->field($model, 'rememberMe')->checkbox([
            //    'template' => "<div class=\"col-lg-offset-1 col-lg-8\">{input} {label}</div>\n<div class=\"col-lg-3\">{error}</div>",
            // ]);
            ?>
            -->
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div id ="correo_pass"  style="border: darkslategray 1px solid; border-radius:15px; padding: 30px 20px">
            <h3> Enviar mi clave a mi correo</h2>
                <div class="gridDosCols40">
                    <div class="form-group">
                        
                        <label class="control-label col-sm-3" for="usuarios-usuar_usuario_mail">Usuario</label>
                        <input id='usuarios-usuar_usuario_mail' class='form-control' name='Usuarios[usuar_usuario]' 
                               value='' aria-required='true' aria-invalid='false' >
                    </div>
                    <div >
                        <button type='submit' class='btn btn-success' style= 'width : 100%' id='btnPideClaveCorreo'>
                            Enviar
                        </button>
                    </div>
                </div>
        </div>
    </div>
</div>
