<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductAttributeModel */

$this->title = 'Create attribute';
?>
<?= $this->render('../default/box_header') ?>
<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
    'product' => $product
]) ?>
<br>
<a href="./?productId=<?= $model->productId ?>" style="font-size: 110%; text-decoration: none !important;"><i
        class=" icon-circle-arrow-left"></i> Back</a>
<?= $this->render('../default/box_footer', ['noLink' => true]) ?>
