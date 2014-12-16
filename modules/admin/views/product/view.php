<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductModel */
Yii::$app->user->returnUrl = Yii::$app->request->getAbsoluteUrl();
$this->title = $model->name;
?>
<?= $this->render('../default/box_header') ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('View attributes', ['./productattributes/index', 'productId' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
        'id',
        'name',
        'description',
        'price',
        'quantity',
        ['value' => $model->getCategory()->one()->name,
            'label' => 'Category'],
        [
            'attribute' => 'photo',
            'value' => "/" . $model->photo,
            'format' => ['image'],
        ]
    ],
]) ?>
<?= $this->render('../default/box_footer') ?>