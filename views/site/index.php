<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
//?>

<!-- Home content -->
<section class="home">


<!-- Slider -->
<section class="flexslider">
    <ul class="slides">
        <li>
            <img src="../img/slides/1.jpg" alt=""/>

            <div class="caption">
                <div class="container">
                    <div class="span6">
                        <h3>360+ Retina-ready icons</h3>
                        <br/>
                        <p>The iconic Font Awesome for Bootstrap</p>
                        <br/> <a class="btn btn-small" title="" href="/retina-ready-icons">Find out more</a>
                        <a class="btn btn-primary btn-small" title=""
                           href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">
                            Buy now &nbsp; <em class="icon-chevron-right"></em>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src="/img/slides/2.jpg" alt=""/>

            <div class="caption">
                <div class="container">
                    <div class="span6">
                        <h3>Built-in Stripe payments</h3>
                        <br/>

                        <p>Instant setup with payment profiles. No monthly fees.</p>
                        <br/> <a class="btn btn-small" title=""
                                 href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">Find
                            out more</a>
                        <a class="btn btn-primary btn-small" title=""
                           href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">
                            Buy now &nbsp; <em class="icon-chevron-right"></em>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src="/img/slides/3.jpg" alt=""/>

            <div class="caption">
                <div class="container">
                    <div class="span6 offset6 text-right">
                        <h3>Feature-packed modules</h3>
                        <br/>

                        <p>Isotope listing, price filtering, instand search and much more...</p>
                        <br/> <a class="btn btn-small" title=""
                                 href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">Find
                            out more</a>
                        <a class="btn btn-primary btn-small" title=""
                           href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">
                            Buy now &nbsp; <em class="icon-chevron-right"></em>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src="/img/slides/4.jpg" alt=""/>

            <div class="caption">
                <div class="container">
                    <div class="span6 offset6 text-right">
                        <h3>Responsive. Flexible &amp; sleek.</h3>
                        <br/>

                        <p>Expertly crafted with Bootstrap front-end framework</p>
                        <br/> <a class="btn btn-small" title=""
                                 href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">Find
                            out more</a>
                        <a class="btn btn-primary btn-small" title=""
                           href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi">
                            Buy now &nbsp; <em class="icon-chevron-right"></em>
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</section>
<!-- End class="flexslider" -->                    <!-- Promos -->
<section class="promos">
    <div class="container">
        <div class="row">
            <div class="span4">
                <div class="free-shipping">
                    <div class="box border-top">
                        <img src="/img/free-shipping.png" alt=""/>

                        <div class="hgroup title">
                            <h3>Free UK shipping!</h3>
                            <h5>This is a snappy sub-title</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro
                            officiis!</p>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="world-shipping">
                    <div class="box border-top">
                        <img src="/img/world-shipping.png" alt=""/>

                        <div class="hgroup title">
                            <h3>We're now global!</h3>
                            <h5>This is a snappy sub-title</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro
                            officiis!</p>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="low-price">
                    <div class="box border-top">
                        <img src="/img/low-price.png" alt=""/>

                        <div class="hgroup title">
                            <h3>Lowest price guarantee!</h3>
                            <h5>This is a snappy sub-title</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro
                            officiis!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End class="promos" -->
<section class="featured">
<div class="container">

<div class="row">
<div class="span9">
<!-- Products list -->
<ul class="product-list isotope">
<li class="standard" data-price="58">
    <a href="product.html" title="Lisette Dress">
        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_48_640xauto.jpg" alt="Lisette Dress"/>
            <img class="secondary" src="/img/thumbnails/db_file_img_49_640xauto.jpg" alt="Lisette Dress"/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£58.00</span>
            </div>
            <h3>Lisette Dress</h3>
        </div>

    </a>
</li>
<li class="standard" data-price="55">
    <a href="product.html" title="El Silencio">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_32_640xauto.jpg" alt="El Silencio"/>
            <img class="secondary" src="/img/thumbnails/db_file_img_33_640xauto.jpg" alt="El Silencio"/>
            <span class="badge badge-sale">SALE</span>
        </div>

        <div class="title">
            <div class="prices">
                <del class="base">£58.00</del>
                <span class="price">£57.99</span>
            </div>
            <h3>El Silencio</h3>
        </div>

    </a>
</li>
<li class="standard" data-price="88">
    <a href="product.html" title="Malta Dress">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_137_640xauto.jpg" alt=""/>
            <img class="secondary" src="/img/thumbnails/db_file_img_138_640xauto.jpg" alt=""/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£88.00</span>
            </div>

            <h3>Malta Dress</h3>

            <div class="rating rating-5">
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
            </div>
        </div>

    </a>
</li>
<li class="standard" data-price="70">
    <a href="product.html" title="Babar Soul">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_92_640xauto.jpg" alt=""/>
            <img class="secondary" src="/img/thumbnails/db_file_img_93_640xauto.jpg" alt=""/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£70.00</span>
            </div>
            <h3>Babar Soul</h3>
        </div>

    </a>
</li>
<li class="standard" data-price="220">
    <a href="product.html" title="Babar Afrique">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_87_640xauto.jpg" alt=""/>
            <img class="secondary" src="/img/thumbnails/db_file_img_88_640xauto.jpg" alt=""/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£220.00</span>
            </div>
            <h3>Babar Afrique</h3>
        </div>

    </a>
</li>
<li class="standard" data-price="50">
    <a href="product.html" title="Nep Pocket Tee">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_10_640xauto.jpg" alt=""/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£50.00</span>
            </div>
            <h3>Nep Pocket Tee</h3>

            <div class="rating rating-3">
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
            </div>
        </div>

    </a>
</li>
<li class="featured" data-price="28">
    <a href="product.html" title="Dustbowl Snapback">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_34_640xauto.jpg" alt=""/>
            <img class="secondary" src="/img/thumbnails/db_file_img_35_640xauto.jpg" alt=""/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£28.00</span>
            </div>
            <h3>Dustbowl Snapback</h3>
        </div>

    </a>
</li>
<li class="standard" data-price="140">
    <a href="product.html" title="Carstensen">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_97_640xauto.jpg" alt=""/>
            <img class="secondary" src="/img/thumbnails/db_file_img_98_640xauto.jpg" alt=""/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£140.00</span>
            </div>
            <h3>Carstensen</h3>
        </div>

    </a>
</li>
<li class="standard" data-price="195">
    <a href="product.html" title="Classic Glasgow in Silver">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_151_640xauto.jpg" alt=""/>
            <img class="secondary" src="/img/thumbnails/db_file_img_152_640xauto.jpg" alt=""/>
            <span class="badge badge-sale">SALE</span>
        </div>

        <div class="title">
            <div class="prices">
                <del class="base">£499.00</del>
                <span class="price">£198.00</span>
            </div>
            <h3>Classic Glasgow</h3>
        </div>

    </a>
</li>
<li class="standard" data-price="38">
    <a href="product.html" title="El Paso Tank">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_122_640xauto.jpg" alt=""/>
            <img class="secondary" src="/img/thumbnails/db_file_img_123_640xauto.jpg" alt=""/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£38.00</span>
            </div>
            <h3>El Paso Tank</h3>

            <div class="rating rating-4.5">
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
            </div>
        </div>

    </a>
</li>
<li class="standard" data-price="72">
    <a href="product.html" title="Bay Blocker">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_39_640xauto.jpg" alt=""/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£72.00</span>
            </div>
            <h3>Bay Blocker</h3>
        </div>

    </a>
</li>
<li class="standard" data-price="58">
    <a href="product.html" title="Marais Dress">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_42_640xauto.jpg" alt=""/>
            <img class="secondary" src="/img/thumbnails/db_file_img_43_640xauto.jpg" alt=""/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£58.00</span>
            </div>
            <h3>Marais Dress</h3>
        </div>

    </a>
</li>
<li class="standard" data-price="48">
    <a href="product.html" title="Amelia Tote">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_44_640xauto.jpg" alt=""/>
            <img class="secondary" src="/img/thumbnails/db_file_img_45_640xauto.jpg" alt=""/>

            <span class="badge badge-sale">SALE</span>
        </div>

        <div class="title">
            <div class="prices">
                <del class="base">£58.00</del>
                <span class="price">£48.00</span>
            </div>
            <h3>Amelia Tote</h3>
        </div>

    </a>
</li>
<li class="standard" data-price="228">
    <a href="product.html" title="Navy Linen Blazer">

        <div class="image">
            <img class="primary" src="/img/thumbnails/db_file_img_155_640xauto.jpg" alt=""/>
            <img class="secondary" src="/img/thumbnails/db_file_img_159_640xauto.jpg" alt=""/>
        </div>

        <div class="title">
            <div class="prices">
                <span class="price">£228.00</span>
            </div>
            <h3>Navy Linen Blazer</h3>
        </div>

    </a>
</li>
</ul>
<!-- End class="product-list isotope" -->
</div>

<div class="span3">
    <!-- Categories widget -->
    <div class="widget Categories">
        <h3 class="widget-title widget-title ">Categories</h3>
        <ul>
            <li>
                <a href='category.html' class="title">Mens</a>

                <ul>
                    <li>
                        <a href='category.html' class="title">T-Shirts</a>
                    </li>
                    <li>
                        <a href='category.html' class="title">Jackets</a>
                    </li>
                    <li>
                        <a href='category.html' class="title">Jumpers</a>
                    </li>
                    <li>
                        <a href='category.html' class="title">Shoes</a>
                    </li>
                    <li>
                        <a href='category.html' class="title">Shirts</a>
                    </li>
                    <li>
                        <a href='category.html' class="title">Accesories</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href='category.html' class="title">Womens</a>
                <ul>
                    <li>
                        <a href='category.html' class="title">Shoes</a>
                    </li>
                    <li>
                        <a href='category.html' class="title">Dresses</a>
                    </li>
                    <li>
                        <a href='category.html' class="title">Bags</a>
                    </li>
                    <li>
                        <a href='category.html' class="title">Trousers</a>
                    </li>
                    <li>
                        <a href='category.html' class="title">Tops</a>
                    </li>
                    <li>
                        <a href='category.html' class="title">Accessories</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- End class="widget Categories" -->

    <!-- This month only! widget -->
    <div class="widget Text">
        <h3 class="widget-title widget-title ">This month only!</h3>
        <h5>Free UK shipping!</h5>
        <h6><i class="icon-gift"> &nbsp; </i> Free gift wrap</h6>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!</p>
        <a class="btn btn-primary" href="#">
            BUY NOW <em>for</em> $85
        </a>
    </div>
    <!-- End class="widget Text" -->

</div>
</div>

</div>
</section>


</section>
<!-- End class="home" -->
<!--<div class="site-index">-->
<!---->
<!--    <div class="jumbotron">-->
<!--        <h1>Congratulations!</h1>-->
<!---->
<!--        <p class="lead">You have successfully created your Yii-powered application.</p>-->
<!---->
<!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
<!--    </div>-->
<!---->
<!--    <div class="body-content">-->
<!---->
<!--        <div class="row">-->
<!--            <div class="col-lg-4">-->
<!--                <h2>Heading</h2>-->
<!---->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur.</p>-->
<!---->
<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
<!--            </div>-->
<!--            <div class="col-lg-4">-->
<!--                <h2>Heading</h2>-->
<!---->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur.</p>-->
<!---->
<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>-->
<!--            </div>-->
<!--            <div class="col-lg-4">-->
<!--                <h2>Heading</h2>-->
<!---->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur.</p>-->
<!---->
<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->
