<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderListItemModel */

$this->title = 'Update Order List Item: ' . ' ' . $model->orderId;
?>
<?= $this->render('../default/box_header') ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<?= $this->render('../default/box_footer') ?>
