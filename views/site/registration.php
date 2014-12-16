<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="login_register">
    <div class="container">
        <div class="row row-centered">
            <div class="span6 col-centered">
                <div class="login">
                    <div class="box">
                        <?php $form = ActiveForm::begin([
                            'id' => 'registration-form',
                            'fieldConfig' => [
                                'template' => "<div class=\"span6\">
                                                    <div class=\"control-group\">{label}
                                                        <div class=\"controls\">{input}
                                                            <div class=\"col-lg-3\">{error}</div>
                                                        </div>
                                                    </div>
                                                </div>",
                                'labelOptions' => ['class' => 'control-label'],
                            ],
                        ]); ?>
                        <div class="hgroup title">
                            <h3><?= Html::encode($this->title) ?></h3>
                            <h5>Registered users can search and buy products. </h5>
                        </div>
                        <div class="box-content">
                            <div class="row-fluid">
                                <?= $form->field($model, 'name') ?>
                                <?= $form->field($model, 'second_name') ?>
                                <?= $form->field($model, 'email')->input('email') ?>
                                <?= $form->field($model, 'phone') ?>
                                <?= $form->field($model, 'password')->passwordInput() ?>
                                <?= $form->field($model, 'confirmation')->passwordInput() ?>
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="pull-left">
                                <button type="submit" class="btn btn-primary btn-small" name="register">
                                    Register
                                </button>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>