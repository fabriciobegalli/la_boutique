<?php

use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderListItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order '.$orderId.': items';
BootstrapAsset::register($this);
BootstrapPluginAsset::register($this);
YiiAsset::register($this);

?>
<?= $this->render('../default/box_header', ['size' => '10']) ?>
    <h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'productId',
        [
            'format' => 'raw',
            'label' => 'Product',
            'attribute' => 'productLink',
        ],
        'quantity',
        'cost',
    ],
]); ?>
    <br>
    <a href="<?= Url::to('../order/view?id=' . $orderId) ?>"
       style="font-size: 110%; text-decoration: none !important;"><i class=" icon-circle-arrow-left"></i> Back</a>
<?= $this->render('../default/box_footer', ['noLink' => true]) ?>