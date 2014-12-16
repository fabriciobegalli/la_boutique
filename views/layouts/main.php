<?php
use app\assets\MainAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

MainAsset::register($this);
$user = Yii::$app->user;
$isGuest = $user->isGuest;
$identity = $user->getIdentity();
$userGroup = ($identity == null ? null : $identity->group);
$isUser = $userGroup == 'user';
$isAdmin = $userGroup == 'admin';
$cartItemsNumber = 0;
if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $key => $value) {
        $cartItemsNumber += intval($value['quantity']);
    }
}
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
    <style>
        .main {
            padding-bottom: 0;
        }
    </style>
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
                    <?php if ($isUser) { ?>
                        <div class="span4">
                            <div class="row-fluid">
                                <div class="span10"></div>
                                <div class="span2">

                                    <!-- Mini cart -->
                                    <div class="mini-cart">

                                        <a href="<?= Url::to(['/user/cart/']) ?>" title="Go to cart &rarr;">
                                            <span id="cartItemsNumber"><?= $cartItemsNumber ?></span>
                                        </a>

                                    </div>
                                    <!-- End class="mini-cart" -->

                                </div>
                            </div>
                        </div>
                    <?php } ?>


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
                                <?php
                                if ($isGuest) {
                                    ?>
                                    <li><a href="<?= Url::to(['/site/registration']) ?>">Register</a></li>
                                    <li><a href="<?= Url::to(['/site/login']) ?>">Log in</a></li>
                                <?php
                                } else if ($isUser) {
                                    ?>
                                    <li>
                                        <a href="<?= Url::to(['/' . $userGroup . '/']) ?>">Shop</a>
                                    </li>
                                    <li><a href="<?= Url::to(['/' . $userGroup . '/order']) ?>">Orders</a>
                                    </li>
                                    <li>
                                        <a href="/site/logout">Log out</a>
                                    </li>

                                <?php
                                } else {
                                    ?>
                                    <li>
                                        <a href="<?= Url::to(['/' . $userGroup . '/']) ?>">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to('/site/logout') ?>">Log out</a>
                                    </li>
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

    <!-- Credits bar -->
    <div class="credits">
        <div class="container">
            <div class="row">
                <div class="span8">
                    <p>&copy; 2014 <a
                            href=/"
                            title="La Boutique">La Boutique</a> &middot; <a
                            href="#"
                            title="Terms &amp; Conditions">Terms &amp; Conditions</a> &middot; <a
                            href="#"
                            title="Privacy policy">Privacy policy</a> &middot; All Rights Reserved. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End class="credits" -->

    <?php $this->endBody() ?>
    <script>
        if (typeof shop != 'undefined'){
            setClicks();
        }
    </script>
</body>
</html>
<?php $this->endPage() ?>
