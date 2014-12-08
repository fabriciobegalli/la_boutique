<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttributeSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attribute Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attribute-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Attribute Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
