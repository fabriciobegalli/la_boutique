<?php

use yii\helpers\Html;

?>
<ul class="nav nav-tabs nav-stacked">
    <?php
    echo Html::tag("li", "<a href='" . Yii::$app->homeUrl . "admin/category/index'></span>Categories</a>",
        ['class' => ($current == 'Categories') ? 'active' : '']);

    echo Html::tag("li", "<a href='" . Yii::$app->homeUrl . "admin/attribute/index'></span>Attributes</a>",
        ['class' => ($current == 'Attributes') ? 'active' : '']);

    echo Html::tag("li", "<a href='" . Yii::$app->homeUrl . "admin/order/index'></span>Orders</a>",
        ['class' => ($current == 'Orders') ? 'active' : '']);

    echo Html::tag("li", "<a href='" . Yii::$app->homeUrl . "admin/product/index'></span>Products</a>",
        ['class' => ($current == 'Products') ? 'active' : '']);

    echo Html::tag("li", "<a href='" . Yii::$app->homeUrl . "admin/user/index'></span>Users</a>",
        ['class' => ($current == 'Users') ? 'active' : '']);
    ?>
</ul>