<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-model-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'date')->textInput() ?>
    <?= $form->field($model, 'completed')->checkbox()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
