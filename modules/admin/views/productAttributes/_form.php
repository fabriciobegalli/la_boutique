<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductAttributeModel */
/* @var $form yii\widgets\ActiveForm */
$remainedAttributes = $model->getOthers($model->productId, $product->categoryId);
?>

<div class="product-characteristic-model-form">

    <?php if (count($remainedAttributes) == 0 && $model->isNewRecord) { ?>
        <div class="form-group">
            <p>You have defined all attributes</p>
        </div>
    <?php } else { ?>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'productId')->hiddenInput()->label(''); ?>
        <?php if ($model->isNewRecord) { ?>
            <?= $form->field($model, 'attributeId')->dropDownList(ArrayHelper::map($remainedAttributes, 'id', 'name'))->label('Attribute') ?>
        <?php } ?>
        <?= $form->field($model, 'value')->textInput(['maxlength' => 20]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    <?php } ?>
</div>
