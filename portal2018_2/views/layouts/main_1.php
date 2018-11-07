<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
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
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            if (Yii::$app->user->isGuest) {
                
                $items = [
                    ['label' => 'Ingresar', 'url' => ['/site/login']]];
            } else {

                //menu 1
                $items = [
                    ['label' => 'Mi Panel', 'url' => ['/empleados/panel']],
                    ['label' => 'Roles',
                        'url' => ['/roles/index'],
                        'options' => ['data-toggle' => 'tooltip',
                            'data-placement' => 'tooltip',
                            'title' => 'Roles',
                            'class' => 'myTooltipClass']
                    ],
                    ['label' => '<div class="profile filled icon"></div>', 'url' => ['/personas/index'], ''],
                    ['label' => 'Usuarios', 'url' => ['/usuarios/index']],
                    ['label' => 'Empleados', 'url' => ['/empleados/index']],
                    ['label' => 'E. Contable', 'url' => ['/estructura-contab/index']],
                    ['label' => 'E. Orgánica', 'url' => ['/estructura-organica/index']],
                ];
            }

            $img = Html::img('@web/img/logo_imagen1.png', ['alt' => 'logo', 'style' => 'position: relative; z-index: 30; top: -15px']);
            $clMenu = 'navbar-light  navbar-fixed-top';
            NavBar::begin([
                'brandLabel' => $img, 'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => $clMenu, 'id' => 'nav_top',
                    'style' => 'background-color: #e3f2fd;'
                    . 'color:#00629f'],
            ]);
            echo Nav::widget([
                'options' => ['class' => ' navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => $items
            ]);
            NavBar::end();

            if (! Yii::$app->user->isGuest) {

                //menu2

                $items = [
                    ['label' => 'Perfiles', 'url' => ['/perfiles-puesto/index']],
                    ['label' => 'Autorizaciones', 'url' => ['/autorizaciones/index']],
                    ['label' => 'Permisos', 'url' => ['/permiso-laboral/index']],
                    ['label' => 'Cursos', 'url' => ['/cursos/index']],
                    ['label' => 'Clases', 'url' => ['/clases/index']],
                    Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                    ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->usuar_nombre . ')', ['class' => 'btn btn-link logout', 'id' => 'btnSalida']
                    )
                    . Html::endForm()
                    . '</li>'
                    )
                ];
                $clMenu = 'navbar-light navbar-fixed-top';

                NavBar::begin([
                    'options' => ['class' => $clMenu, 'id' => 'nav_bottom', 'style' => 'background-color: #e3f2fd;'
                    ],
                ]);
                echo Nav::widget([
                    'options' => ['class' => ' navbar-nav navbar-right'],
                    'encodeLabels' => false,
                    'items' => $items
                ]);
                NavBar::end();
            }
            ?>

            <div class="container">
            <?php
            //echo                 Breadcrumbs::widget([
            //      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            //  ])
            ?>
                <?= '<hr>' ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; CANACO Cd de México <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>



            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
        <?php $this->endPage() ?>
