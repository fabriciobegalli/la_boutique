<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use app\assets\ShopBundle;
use app\models\ProductModel;

$this->title = 'Shop';
ShopBundle::register($this);
$maxPrice = ProductModel::findMaxPrice($id);
$productCount = count($ptDataProvider->getModels());
?>
<section class="category">
    <div class="container">
        <div class="row">
            <div class="span3">
                <aside class="sidebar">
                    <div class="children">
                        <div class="box border-top">
                            <div class="hgroup title">
                                <h3>
                                    <a href="#" title="Categories">Categories</a>
                                </h3>
                            </div>
                            <?php

                            $items = array();
                            ?>
                            <ul class="category-list secondary">
                                <?php
                                for ($i = count($ctDataProvider->getModels()) - 1; $i > -1; $i--) {
                                    $items[] = [
                                        'label' => $ctDataProvider->getModels()[$i]['name'],
                                        'url' => "/user/catalog/index?id=" . $ctDataProvider->getModels()[$i]['id'],
                                        'class' => ($id == $ctDataProvider->getModels()[$i]['id']) ? 'current' : ''
                                    ];
                                }

                                foreach ($items as $item) { ?>
                                    <li class="<?= $item['class'] ?>">
                                        <a href="<?= $item['url'] ?>"
                                           title="<?= $item['label'] ?>">
                                            <?= $item['label'] ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>


                    <!-- Price filter -->
                    <div class="price-filter">
                        <div class="box border-top">
                            <div class="hgroup title">
                                <h3>Refine products</h3>
                                <h5>Filter your products by price</h5>
                            </div>

                            <div id="slider" data-max="<?= $maxPrice ?>" data-step="5" data-currency="&dollar;"></div>
                            <span id="slider-label">Price range: <strong>$0 &ndash; $<?= $maxPrice ?></strong></span>
                        </div>
                    </div>
                    <div class="box border-top">
                        <div class="hgroup title">
                            <h3>Search</h3>
                            <h5>Search products in this category</h5>
                        </div>
                        <div>
                            <form action="/user/catalog/search" method="get">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="text" placeholder="Enter query..."
                                       class="form-control"
                                       id="key"
                                       name="key"
                                    />
                                <button class="btn btn-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="span9">
                <?php if ($productCount > 0) { ?>
                    <ul class="product-list isotope">
                        <?php
                        for ($i = 0; $i < $productCount; $i++) {
                            $product = $ptDataProvider->getModels()[$i];
                            $id = $ptDataProvider->getModels()[$i]['id'];
                            $name = $product['name'];
                            $img = Yii::$app->request->BaseUrl . "/" . $product['photo'];
                            $price = $product['price'];
                            $productUrl = Yii::$app->homeUrl . 'user/catalog/view?id=' . $id;
                            $addToCartUrl = Yii::$app->homeUrl . 'user/catalog/add-to-cart';
                            $removeFromCartUrl = Yii::$app->homeUrl . 'user/catalog/remove-from-cart';
                            ?>
                            <li class="standard" data-price="<?= $price ?>">
                                <a href="<?= $productUrl ?>" title="<?= $name ?>">
                                    <div class="image">
                                        <img class="primary" src="<?= $img ?>"
                                             alt="<?= $name ?>"/>
                                    </div>
                                    <div class="title">
                                        <div class="prices">
                                            <span class="price">$<?= $price ?></span>
                                        </div>
                                        <h3><?= $name ?></h3>
                                    </div>
                                    <div>
                                        <button style="width: 50%;float: left;display: block"
                                                class="addToCartButton btn btn-primary"
                                                data-id="<?= $id ?>"
                                                data-url="<?= $addToCartUrl ?>">
                                            To cart
                                        </button>
                                        <button style="width: 50%;float: left;display: block"
                                                class="removeFromCartButton btn btn-danger"
                                                data-id="<?= $id ?>"
                                                data-url="<?= $removeFromCartUrl ?>">
                                            From cart
                                        </button>
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p style="text-align: center">Sorry, nothing found.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>