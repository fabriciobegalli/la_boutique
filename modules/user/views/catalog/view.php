<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use app\assets\ShopBundle;

$this->title = $product->name;
$img = Yii::$app->request->BaseUrl . "/" . $product['photo'];
ShopBundle::register($this);
$addToCartUrl = Yii::$app->homeUrl . 'user/catalog/add-to-cart';
$removeFromCartUrl = Yii::$app->homeUrl . 'user/catalog/remove-from-cart';
?>
<section class="product">
    <!-- Product info -->
    <section class="product-info">
        <div class="container">
            <div class="row">

                <div class="span4">
                    <div class="product-images">
                        <div class="box">
                            <div class="primary">
                                <img src="<?= $img ?>" data-zoom-image="<?= $img ?>"
                                     alt="Chaser Overalls"/>
                            </div>
                            <div class="social">
                                <div id="sharrre">
                                    <div class="facebook"></div>
                                    <div class="twitter"></div>
                                    <div class="pinterest"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="span8">

                    <!-- Product content -->
                    <div class="product-content">
                        <div class="box">

                            <!-- Tab panels' navigation -->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#product" data-toggle="tab">
                                        <i class="icon-reorder icon-large"></i>
                                        <span class="hidden-phone">Product</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#description" data-toggle="tab">
                                        <i class="icon-info-sign icon-large"></i>
                                        <span class="hidden-phone">Info</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#shipping" data-toggle="tab">
                                        <i class="icon-truck icon-large"></i>
                                        <span class="hidden-phone">Shipping</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#returns" data-toggle="tab">
                                        <i class="icon-undo icon-large"></i>
                                        <span class="hidden-phone">Returns</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Tab panels' navigation -->


                            <!-- Tab panels container -->

                            <div class="tab-content">

                                <!-- Product tab -->
                                <div class="tab-pane active" id="product">
                                    <form enctype="multipart/form-data" action="#" onsubmit="return false;"
                                          method="post">

                                        <div class="details">
                                            <h1><?= $product->name ?></h1>

                                            <div class="prices"><span class="price">$<?= $product->price ?></span></div>

                                            <div class="meta">
                                                <div class="categories">
                                                    <span><i class="icon-tags"></i></span>
                                                    <a href="/user/catalog/index?id=<?= $product->categoryId ?>"
                                                       title="<?= $product->category->name ?>"><?= $product->category->name ?></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="short-description">
                                            <p><?= $product->description ?></p>
                                        </div>


                                        <div class="add-to-cart">

                                            <button style="margin-right: 15px;"
                                                    class="addToCartButton btn btn-primary btn-large"
                                                    data-id="<?= $product->id ?>"
                                                    data-url="<?= $addToCartUrl ?>">
                                                <i class="icon-plus"></i> Add to cart
                                            </button>
                                            <button class="removeFromCartButton btn btn-danger btn-large"
                                                    data-id="<?= $product->id ?>"
                                                    data-url="<?= $removeFromCartUrl ?>">
                                                <i class="icon-minus"></i> Remove from cart
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- End id="product" -->

                                <!-- Description tab -->
                                <div class="tab-pane" id="description">
                                    <!-- End id="description" -->
                                    <?php foreach ($product->productAttributes as $attr) { ?>
                                        <p><?= $attr->attributes->name ?>: <?= $attr->value ?> <?= $attr->attributes->measureUnits ?></p>
                                    <?php } ?>
                                </div>
                                <!-- End id="description" -->

                                <!-- Shipping tab -->
                                <div class="tab-pane" id="shipping">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                        eget dolor.</p>

                                    <p>
                                        <img class="img-polaroid" src="/img/royal-mail.png" alt=""/>
                                        <img class="img-polaroid" src="/img/ups-logo.png" alt=""/>
                                    </p>

                                    <p>Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus.</p>
                                    <h6><em class="icon-gift"></em> Giftwrap?</h6>

                                    <p>Let us take care of giftwrapping your presents by selecting
                                        <strong>Giftwrap</strong> in the order process. Eligible items can be
                                        giftwrapped for as little as &pound;0.99, and larger items may be presented in
                                        gift bags.</p>
                                </div>
                                <!-- End id="shipping" -->

                                <!-- Returns tab -->
                                <div class="tab-pane" id="returns">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                        eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient
                                        montes, nascetur ridiculus mus.</p>

                                    <p class="lead">For any unwanted goods La Boutique offers a <strong>21-day return
                                            policy</strong>.</p>

                                    <p>If you receive items from us that differ from what you have ordered, then you
                                        must notify us as soon as possible using our <a href="#">online contact form</a>.
                                    </p>

                                    <p>If you find that your items are faulty or damaged on arrival, then you are
                                        entitled to a repair, replacement or a refund. Please note that for some goods
                                        it may be disproportionately costly to repair, and so where this is the case,
                                        then we will give you a replacement or a refund.</p>

                                    <p>Please visit our <a href="#">Warranty section</a> for more details.</p>
                                </div>
                                <!-- End id="returns" -->
                            </div>
                            <!-- End tab panels container -->

                        </div>

                    </div>
                    <!-- End class="product-content" -->

                </div>


            </div>
        </div>
    </section>
    <!-- End class="product-info" -->

</section>