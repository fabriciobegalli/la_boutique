<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 12/15/2014
 * Time: 8:19 PM
 */

namespace app\assets;


use yii\web\AssetBundle;

class ShopBundle extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/shop.js',
        'js/bootstrap.js'
    ];
    public $depends = [
        'app\assets\MainAsset'
    ];
}
