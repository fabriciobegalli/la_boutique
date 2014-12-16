<?php

namespace app\assets;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'css/bootstrap-responsive.css',
        'css/fonts/font-awesome.css',
        'css/flexslider.css',
        'css/color-schemes/core.css',
        'css/color-schemes/turquoise.css',
        'css/color-schemes/custom.css'
    ];
    public $js = [
        'js/jquery-migrate-1.2.1.min.js',
        'js/jquery-ui-1.10.2.custom.js',
        'js/jquery.easing-1.3.min.js',
        'js/jquery.isotope.min.js',
        'js/jquery.flexslider.js',
        'js/jquery.elevatezoom.js',
        'js/jquery.sharrre-1.3.4.js',
        'js/imagesloaded.js',
        'js/la_boutique.js',
        'js/jquery.cookie.js',
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
