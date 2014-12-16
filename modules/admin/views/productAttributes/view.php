<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductAttributeModel */

$this->title = $model->attributes->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Characteristic Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('../default/box_header') ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'productId' => $model->productId, 'attributeId' => $model->attributeId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'productId' => $model->productId, 'attributeId' => $model->attributeId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'productId',
            'attributeId',
            'value',
        ],
    ]) ?>
<a href="./?productId=<?= $model->productId ?>" style="font-size: 110%; text-decoration: none !important;"><i
        class=" icon-circle-arrow-left"></i> Back</a>
<?= $this->render('../default/box_footer', ['noLink' => true]) ?>
