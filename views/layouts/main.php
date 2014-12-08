<?php
use app\assets\MainAssetsBundle;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

MainAssetsBundle::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=7; IE=8"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link
        href="http://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic|Shadows+Into+Light"
        rel="stylesheet" type="text/css">
</head>
<body>

<body>

<div class="wrapper">

<!-- Header -->
<div class="header">
    <!-- Logo & Search bar -->
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="span8">
                    <div class="logo">
                        <a href="<?= Url::home() ?>" title="&larr; Back home">
                            <?= Html::img('/img/logo.png', ['alt' => 'La Boutique']) ?>
                        </a>
                    </div>
                </div>

                <div class="span4">
                    <div class="row-fluid">
                        <div class="span10">

                            <!-- Search -->
                            <div class="search">
                                <div class="qs_s">

                                    <form method="post" action="search.html">
                                        <input type="text" name="query" id="query" placeholder="Search&hellip;"
                                               autocomplete="off" value="">
                                    </form>

                                    <!-- Autocomplete results -->
                                    <div id="autocomplete-results" style="display: none;">
                                        <ul>
                                            <li>
                                                <a title="Lisette Dress" href="product.html">
                                                    <div class="image">
                                                        <img src="/img/thumbnails/db_file_img_48_60x60.jpg" alt=""/>
                                                    </div>
                                                    <h6>Lisette Dress</h6>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Malta Dress" href="product.html">
                                                    <div class="image">
                                                        <img src="/img/thumbnails/db_file_img_137_60x60.jpg" alt=""/>
                                                    </div>
                                                    <h6>Malta Dress</h6>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Marais Dress" href="product.html">
                                                    <div class="image">
                                                        <img src="/img/thumbnails/db_file_img_42_60x60.jpg" alt=""/>
                                                    </div>
                                                    <h6>Marais Dress</h6>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Millay Dress" href="product.html">
                                                    <div class="image">
                                                        <img src="/img/thumbnails/db_file_img_107_60x60.jpg" alt=""/>
                                                    </div>
                                                    <h6>Millay Dress</h6>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Momoko Dress" href="product.html">
                                                    <div class="image">
                                                        <img src="/img/thumbnails/db_file_img_132_60x60.jpg" alt=""/>
                                                    </div>
                                                    <h6>Momoko Dress</h6>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End id="autocomplete-results" -->


                                </div>
                            </div>
                            <!-- End class="search"-->

                        </div>

                        <div class="span2">

                            <!-- Mini cart -->
                            <div class="mini-cart">
                                <a href="cart.html" title="Go to cart &rarr;">
                                    <span>3</span>
                                </a>
                            </div>
                            <!-- End class="mini-cart" -->

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- End class="bottom" -->

</div>
<!-- End class="header" -->            <!-- Navigation -->
<nav class="navigation">
    <div class="container">

        <div class="row">
            <div class="span9">

                <a href="#" class="main-menu-button">Navigation</a>
                <!-- Begin Menu Container -->
                <div class="megamenu_container">
                    <div class="menu-main-navigation-container">
                        <ul id="menu-main-navigation" class="main-menu">
                            <li><a href="/">Home</a></li>
                            <li><a href="category.html">Shop</a></li>
                            <li><a href="category.html">Shop</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="cart.html">Contact Us</a></li>
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <li><a href="<?= Url::to(['account/login'])?>">Log in</a></li>
                            <?php } else { ?>
                                <li><a href="<?= Url::home()?>">Profile</a></li>
                                <li><a href="<?= Url::to(['account/logout'])?>">Log out</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span3 visible-desktop">
            </div>
        </div>

    </div>
</nav>
<!-- End class="navigation" -->


<!-- Content section -->
<section class="main">
    <?= $content ?>
</section>
<!-- End class="main" -->

<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row">

            <div class="span2">
                <!-- Support -->
                <div class="support">
                    <h6>Support</h6>

                    <ul class="links">
                        <li>
                            <a href="about-us.html" title="About us" class="title">About us</a>
                        </li>
                        <li>
                            <a href="typography.html" title="Typography" class="title">Typography</a>
                        </li>
                        <li>
                            <a href="retina-ready-icons.html" title="Retina-ready icons" class="title">Retina-ready
                                icons</a>
                        </li>
                        <li>
                            <a href="buttons.html" title="Buttons" class="title">Buttons</a>
                        </li>
                        <li>
                            <a href="elements.html" title="Elements" class="title">Elements</a>
                        </li>
                        <li>
                            <a href="grids.html" title="Grids" class="title">Grids</a>
                        </li>
                        <li>
                            <a href="store-locator.html" title="Store locator" class="title">Store locator</a>
                        </li>
                        <li>
                            <a href="contact-us.html" title="Contact us" class="title">Contact us</a>
                        </li>
                    </ul>
                </div>
                <!-- End class="support" -->

                <hr/>

                <!-- My account -->
                <div class="account">
                    <h6>My account</h6>

                    <ul class="links">
                        <li>
                            <a href="login-register.html" title="Login / Register">Login / Register</a>
                        </li>
                    </ul>
                </div>
                <!-- End class="account"-->

            </div>

            <div class="span2">

                <!-- Categories -->
                <div class="categories">
                    <h6>Shop</h6>

                    <ul class="links">
                        <li>
                            <a href="category.html" title="Women">Women</a>
                        </li>
                        <li>
                            <a href="category.html" title="Men">Men</a>
                        </li>
                        <li>
                            <a href="category.html" title="Girls">Girls</a>
                        </li>
                        <li>
                            <a href="category.html" title="Boys">Boys</a>
                        </li>
                        <li>
                            <a href="category.html" title="Sale"><strong>Sale</strong></a>
                        </li>
                    </ul>
                </div>
                <!-- End class="categories" -->

                <hr/>

                <!-- Pay with confidence -->
                <div class="confidence">
                    <h6>Pay with confidence</h6>

                    <img src="/img/stripe.png" alt="We accept all major credit cards"/>
                </div>
                <!-- End class="confidence" -->
            </div>

            <div class="span4">
                <h6>From the blog</h6>

                <ul class="list-chevron links">
                    <li>
                        <a href="blog-post.html">Article with video</a>
                        <small>05/01/2013</small>
                    </li>
                    <li>
                        <a href="blog-post.html">Article with images</a>
                        <small>03/14/2013</small>
                    </li>
                    <li>
                        <a href="blog-post.html">Article with style!</a>
                        <small>08/31/2013</small>
                    </li>
                </ul>
            </div>

            <div class="span4">

                <!-- Newsletter subscription -->
                <div class="newsletter">
                    <h6>Newsletter subscription</h6>

                    <form onsubmit="$('#newsletter_subscribe').modal('show'); return false;"
                          enctype="multipart/form-data" action="index.html" method="post">

                        <div class="input-append">
                            <input type="text" class="span3" name="email"/>
                            <button class="btn" type="submit">Go!</button>
                        </div>

                    </form>

                    <p>Sign up to receive our latest news and updates direct to your inbox</p>
                </div>
                <!-- End class="newsletter" -->


                <hr/>

                <!-- Social icons -->
                <div class="social">
                    <h6>Socialize with us</h6>

                    <ul class="social-icons">

                        <li>
                            <a class="twitter" href="#" title="Twitter">Twitter</a>
                        </li>

                        <li>
                            <a class="facebook" href="#" title="Facebook">Facebook</a>
                        </li>

                        <li>
                            <a class="pinterest" href="#" title="Pinterest">Pinterest</a>
                        </li>

                        <li>
                            <a class="youtube" href="#" title="YouTube">YouTube</a>
                        </li>

                        <li>
                            <a class="vimeo" href="#" title="Vimeo">Vimeo</a>
                        </li>

                        <li>
                            <a class="flickr" href="#" title="Flickr">Flickr</a>
                        </li>

                        <li>
                            <a class="googleplus" href="#" title="Google+">Google+</a>
                        </li>

                        <li>
                            <a class="dribbble" href="#" title="Dribbble">Dribbble</a>
                        </li>

                        <li>
                            <a class="tumblr" href="#" title="Tumblr">Tumblr</a>
                        </li>

                        <li>
                            <a class="digg" href="#" title="Digg">Digg</a>
                        </li>

                        <li>
                            <a class="linkedin" href="#" title="LinkedIn">LinkedIn</a>
                        </li>

                        <li>
                            <a class="instagram" href="#" title="Instagram">Instagram</a>
                        </li>

                    </ul>
                </div>
                <!-- End class="social" -->

            </div>
        </div>
    </div>
</div>
<!-- End id="footer" -->
<!-- Credits bar -->
<div class="credits">
    <div class="container">
        <div class="row">
            <div class="span8">
                <p>&copy; 2014 <a
                        href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi"
                        title="La Boutique">La Boutique</a> &middot; <a
                        href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi"
                        title="Terms &amp; Conditions">Terms &amp; Conditions</a> &middot; <a
                        href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi"
                        title="Privacy policy">Privacy policy</a> &middot; All Rights Reserved. </p>
            </div>
            <div class="span4 text-right hidden-phone">
                <p><a href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi"
                      title="Responsive eCommerce template">Responsive eCommerce template by Tfingi</a></p>
            </div>
        </div>
    </div>
</div>
<!-- End class="credits" -->
<!-- Newsletter modal window -->
<div id="newsletter_subscribe" class="modal hide fade" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="hgroup title">
            <h3>You are now subscribed to our newsletter</h3>
            <h5>All the latest deals and offers will be making their way to your inbox shortly!</h5>
        </div>
    </div>

    <div class="modal-footer">
        <div class="pull-left">
            <button data-dismiss="modal" aria-hidden="true" class="btn btn-small">
                Close &nbsp; <i class="icon-ok"></i>
            </button>
        </div>
    </div>
</div>
<!-- End id="newsletter_subscribe" -->
</div>

<?php $this->endBody() ?>
</body>

<!---->
<?php //$this->beginBody() ?>
<!--<div class="wrap">-->
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => 'My Company',
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest ?
//                ['label' => 'Login', 'url' => ['/site/login']] :
//                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
//                    'url' => ['/site/logout'],
//                    'linkOptions' => ['data-method' => 'post']],
//        ],
//    ]);
//    NavBar::end();
//
?>
<!---->
<!--    <div class="container">-->
<!--        --><?//= Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ])
?>
<!--        --><? //= $content ?>
<!--    </div>-->
<!--</div>-->
<!---->
<!--<footer class="footer">-->
<!--    <div class="container">-->
<!--        <p class="pull-left">&copy; My Company --><? //= date('Y') ?><!--</p>-->
<!--        <p class="pull-right">--><? //= Yii::powered() ?><!--</p>-->
<!--    </div>-->
<!--</footer>-->


</html>
<?php $this->endPage() ?>
