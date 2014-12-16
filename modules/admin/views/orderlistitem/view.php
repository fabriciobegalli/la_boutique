<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderListItemModel */

$this->title = 'Update Order List Item: ' . ' ' . $model->orderId;
?>
<?= $this->render('../default/box_header') ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'orderId' => $model->orderId, 'productId' => $model->productId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'orderId' => $model->orderId, 'productId' => $model->productId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'Order number',
            'format' => 'raw',
            'value' => Html::a($model->orderId, ['./order/view', 'id' => $model->orderId]),
        ],
        [
            'label' => 'Product',
            'format' => 'raw',
            'value' => Html::a($model->product->name, ['./product/view', 'id' => $model->product->id]),
        ],
        'quantity',
        'cost',
    ],
]) ?>
<?= $this->render('../default/box_footer') ?>