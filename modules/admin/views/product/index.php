<?php

use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
BootstrapAsset::register($this);
BootstrapPluginAsset::register($this);
YiiAsset::register($this);
?>

<section class="main">
    <section class="static_page_1">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <section class="static-page" id="static-page">
                        <div class="row-fluid">
                            <div class="span2">
                                <?= $this->render('../default/menu_left', ['current' => $this->title]); ?>
                            </div>
                            <div class="span10">
                                <div class="content">
                                    <h1><?= Html::encode($this->title) ?></h1>
                                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                                    <p>
                                        <?= Html::a('Create new', ['create'], ['class' => 'btn btn-success']) ?>
                                    </p>

                                    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            'id',
                                            'name',
                                            'description',
                                            'price',
                                            // 'quantity',
                                            // 'photo',
                                            // 'categoryId',

                                            ['class' => 'yii\grid\ActionColumn', 'urlCreator' => function ($action, $model, $key, $index) {
                                                $params = is_array($key) ? $key : ['id' => (string)$key];
                                                $params[0] = '../admin/product' . '/' . $action;

                                                return Url::toRoute($params);
                                            }],
                                        ],
                                    ]); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</section>