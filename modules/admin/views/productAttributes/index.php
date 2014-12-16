<?php

use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product attributes';
BootstrapAsset::register($this);
BootstrapPluginAsset::register($this);
YiiAsset::register($this);
Yii::$app->user->returnUrl = Yii::$app->request->getAbsoluteUrl();
?>
<?= $this->render('../default/box_header', ['size' => '10']) ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create attribute', ['create', 'productId' => $productId], ['class' => 'btn btn-success']) ?>
    </p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'productId',
        [
            'format' => 'raw',
            'label' => 'Product name',
            'attribute' => 'productLink',
        ],
        'attributeId',
        [
            'format' => 'raw',
            'label' => 'Attribute name',
            'attribute' => 'attributeLink',
        ],
        'value',
        ['class' => 'yii\grid\ActionColumn', 'urlCreator' => function ($action, $model, $key, $index) {
            $params = is_array($key) ? $key : ['id' => (string)$key];
            $params[0] = '../admin/productattributes' . '/' . $action;

            return Url::toRoute($params);
        }]
    ],
]);
?><a href="../product/view?id=<?= $productId ?>" style="font-size: 110%; text-decoration: none !important;"><i
        class=" icon-circle-arrow-left"></i> Back</a>
<?= $this->render('../default/box_footer', ['size' => '10', 'noLink' => true]) ?>