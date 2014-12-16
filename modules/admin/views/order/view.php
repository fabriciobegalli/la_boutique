<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderModel */

$this->title = 'Order: ' . $model->id;
?>
<?= $this->render('../default/box_header') ?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('View items', ['./orderlistitem/index', 'orderId' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
        'id',
        'userId',
        'date',
        'cost',
        [
            'attribute' => 'completed',
            'value' => $model->completed ? 'True' : 'False'
        ]
    ],
]) ?>

<?= $this->render('../default/box_footer') ?>
