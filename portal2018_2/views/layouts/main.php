<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\RolMenu;
use app\models\Usuarios;
use app\models\Empleados;
use yii\jui\Accordion;

AppAsset::register($this);

function AddElemento($label, $url) {
    if (is_array($url)) {
        return ['contenido' => Html::a($label, $url)];
    } else {
        return ['contenido' => Html::a($label, [$url])];
    }
}

function mkeLi($el) {
    return ' <li>' . $el['contenido'] . '</li>';
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body style="border: 4px solid palegoldenrod">
        <?php $this->beginBody() ?>

        <div class="wrap" style="border: 1px solid peachpuff">
            <?php
            $modo = 'RH';
            if ($modo <> 'RH') {

                $menu = array();
                $menu[] = Html::img('@web/img/logo_imagen1.png', ['alt' => 'logo1',
                            'style' => ' margin-top: 10px; margin-bottom:15px']);
                if (Yii::$app->user->isGuest) {
                    
                    $menu[] = AddElemento('Ingresar', '/site/login');
                    
                }
                $menu[] = AddElemento('Directorio', '/empleados');
                $menu[] = AddElemento('Eventos', '/eventos/calendario');
                $menu[] = AddElemento('Formatos', '/formatos');

                if (!Yii::$app->user->isGuest) {
                    $menu[] = AddElemento('Mi Panel', '/empleados/panel');

                    $menu[] = 'Mis...';
                    $menu[] = AddElemento('Permisos', '/empleados');
                    /* todo lleva un if */
                    $menu[] = AddElemento('Autorizaciones', '/eventos/calendario');
                    $menu[] = AddElemento('Solicitudes Mnto.', '/site/proximamente');
                    $menu[] = AddElemento('Sistemas', '/site/proximamente');
                    $menu[] = AddElemento('Cursos', '/site/proximamente');
                    $menu[] = '';
                    $menu[] = 'Documentos...';
                    $menu[] = AddElemento('CRM', '/site/proximamente');
                    $menu[] = AddElemento('Protección Civil', '/site/proximamente');
                    $menu[] = AddElemento('SGC', '/sgc');
                    $menu[] = '';
                    $menu[] = AddElemento('Institucional', '/site/proximamente');

                    $u = Usuarios::findOne(Yii::$app->user->identity->usuar_id);
                    foreach ($u->usuarRols as $r) {
                        $menu[] = $r->rol->rol_nombre;
                        foreach ($r->rol->rolMenus as $m) {
                            $menu[] = AddElemento($m->rolme_label, $m->rolme_url);

                            $items[] = ['label' => $m->rolme_label,
                                'url' => [$m->rolme_url],
                                'options' => ['data-toggle' => 'tooltip',
                                    'data-placement' => 'tooltip',
                                    'title' => $m->rolme_tooltip,
                                    'class' => 'myTooltipClass']
                            ];
                        }
                        $menu[] = '';
                    }

                    $menu[] = Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                    'Cerrar sesion: ' . Yii::$app->user->identity->usuar_usuario, ['class' => 'btn btn-link logout', 'id' => 'btnSalida']
                            )
                            . Html::endForm();
                }
            } else {


                $menu = array();
                $menu[] = Html::img('@web/img/logo_imagen1.png', ['alt' => 'logo1',
                            'style' => ' margin-top: 10px; margin-bottom:15px']);
                if (Yii::$app->user->isGuest) {
                    
                    $menu[] = AddElemento('Ingresar', '/site/login');
                }

                if (!Yii::$app->user->isGuest) {
                    
                    $u = Usuarios::findOne(Yii::$app->user->identity->usuar_id);
                    
             
                    
                    $menu[] = AddElemento('Mi Panel', '/empleados/panel');
                    $menu[] = AddElemento('Solicitar permiso', ["permiso-laboral/add", 'idMaster' => $u->usuar_relacion_id]);

                    foreach ($u->usuarRols as $r) {
                        if ($r->rol->rol_nombre <> 'Empleado') {
                            $menu[] = $r->rol->rol_nombre;
                            foreach ($r->rol->rolMenus as $m) {
                                $menu[] = AddElemento($m->rolme_label, $m->rolme_url);

                                $items[] = ['label' => $m->rolme_label,
                                    'url' => [$m->rolme_url],
                                    'options' => ['data-toggle' => 'tooltip',
                                        'data-placement' => 'tooltip',
                                        'title' => $m->rolme_tooltip,
                                        'class' => 'myTooltipClass']
                                ];
                            }
                        }
                        $menu[] = '';
                    }

                    $menu[] = Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                    'Cerrar sesion: ' . Yii::$app->user->identity->usuar_usuario, ['class' => 'btn btn-link logout', 'id' => 'btnSalida']
                            )
                            . Html::endForm();

                         }
                 
            }
            ?>

            <div class="gridM">
                <div id="nav_v">
                    <nav class="menu_a" id = "menua">    
                        <ul>
                            <?php
                            foreach ($menu as $el) {
                                if (is_array($el)) {
                                    echo mkeLi($el);
                                } else if ($el == '') {
                                    echo '</ul>';
                                } else if (strpos($el, 'form') > 0) {
                                    echo '<li>' . $el . '</li>';
                                } else if (strpos($el, 'img') > 0) {
                                    echo '<li id="logoMenu">' . $el . '</li>';
                                } else if ($el <> '') {
                                    echo '<li  onclick="menuAbre(this)" class="subMenu" > ' . $el . '<ul class="n2">';
                                } else {
                                    //echo '<li></ul>';
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="containerM" >
                    <?php
//echo                 Breadcrumbs::widget([
//      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//  ])
                    ?>

                    <?= Alert::widget() ?>
                    <?php echo $content ?>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; CANACO CD DE MÉXICO <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage();
?>

