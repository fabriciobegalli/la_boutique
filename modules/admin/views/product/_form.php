<?php

use app\models\CategoryModel;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-model-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'categoryId')->dropDownList(ArrayHelper::map(CategoryModel::find()->all(), 'id', 'name'))->label('Category') ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'photo')->fileInput(['accept' => "image/gif, image/jpeg, image/png"]) ?>
    <?php if ($model->photo != "") echo "<img src='" . Yii::$app->request->BaseUrl . "/{$model->photo}' width='100px' />" ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
