<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'role')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
