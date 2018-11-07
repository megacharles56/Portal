<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Eventos */

$this->title = 'Crear Eventos';

$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventos-create forma">

    <h1><?= Html::encode($this->title) ?></h1>
        
            <?php
            if ($warning <> '')
                echo
                "<span class='text-danger bg-info'
                          style='font-size: 1.4em; border: solid blue 1px; padding: 4px'>" .
                $warning . "</span>";
            ?>     
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
