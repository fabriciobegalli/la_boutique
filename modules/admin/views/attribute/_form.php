<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CategoryModel;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\AttributeModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="characteristic-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoryId')->dropDownList(ArrayHelper::map(CategoryModel::find()->all(), 'id', 'name'))->label('Category') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'measureUnits')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
