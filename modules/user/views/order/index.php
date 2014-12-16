<?php

use app\assets\ShopBundle;
use app\models\ProductModel;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
Yii::$app->user->returnUrl = Yii::$app->request->getAbsoluteUrl();
$this->title = 'Orders';
ShopBundle::register($this);
?>


<?= $this->render('../default/box_header') ?>
<?php
for ($i = 0; $i < count($orders); $i++) { ?>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default" style="box-shadow: 0 3px 23px rgba(71, 73, 72, 0.25)">
            <div class="panel-heading" role="tab" id="heading<?= $orders[$i]->id ?>">
                <h6 class="panel-title" style="font-weight: bold">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $orders[$i]->id ?>" aria-expanded="true"
                       aria-controls="collapse<?= $orders[$i]->id ?>">
                        <p>Number: <?= $orders[$i]->id ?></p>
                        <p>Date: <?= $orders[$i]->date ?></p>
                        <p>Cost: <?= $orders[$i]->cost ?></p>
                        <p>Completed: <?= $orders[$i]->completed ? 'true' : 'false' ?></p>
                    </a>
                </h6>
            </div>
            <div id="collapse<?= $orders[$i]->id ?>" class="panel-collapse collapse" role="tabpanel"
                 aria-labelledby="heading<?= $orders[$i]->id ?>">
                <div class="panel-body">
                    <?php
                    echo GridView::widget([
                        'dataProvider' => $items[$i],
                        'columns' => [
                            [
                                'attribute' => 'Name',
                                'value' => function ($model) {
                                    return ProductModel::find()->where(['id' => $model['productId']])->one()->name;
                                },
                            ],
                            'quantity',
                            'orderId',
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?= $this->render('../default/box_footer') ?>