<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderModel */

$this->title = 'Create order';
$this->params['breadcrumbs'][] = ['label' => 'Order Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('../default/box_header') ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<?= $this->render('../default/box_footer') ?>
