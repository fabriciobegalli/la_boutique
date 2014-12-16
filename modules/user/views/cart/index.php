<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
Yii::$app->user->returnUrl = Yii::$app->request->getAbsoluteUrl();
$this->title = 'Cart';
?>
<?= $this->render('../default/box_header') ?>
<?php
if ($ptDataProvider != null) {
    echo GridView::widget([
        'dataProvider' => $ptDataProvider,
        'columns' => [
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model['name'], Yii::$app->homeUrl . 'user/catalog/view?id=' . $model['id']);
                },
            ],
            'price',
            [
                'attribute' => 'Quantity',
                'value' => function ($model) {
                    return $_SESSION['cart_items'][$model['id']]['quantity'];
                },
            ],
            [
                'attribute' => 'Total price',
                'value' => function ($model) {
                    return $_SESSION['cart_items'][$model['id']]['quantity'] * $model['price'];
                },
            ],
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Remove', Yii::$app->homeUrl . 'user/cart/remove?id=' . $model['id'], ['class' => 'btn btn-x btn-danger']);
                },
            ],
        ],
    ]);
    $cost = 0;
    for ($i = 0; $i < $ptDataProvider->count; $i++) {
        $cost += $_SESSION['cart_items'][$ptDataProvider->getModels()[$i]['id']]['quantity'] * $ptDataProvider->getModels()[$i]['price'];
    }
    ?>

    <p style="color:grey;">Total price of the order: <?= $cost ?></p>
    <?= Html::a('Make order', Yii::$app->homeUrl . 'user/cart/make-order', ['class' => 'btn btn-x btn-primary']);

}
?>
<?= $this->render('../default/box_footer') ?>