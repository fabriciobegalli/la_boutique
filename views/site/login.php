<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="login_register">
    <div class="container">
        <div class="row row-centered">
            <div class="span6 col-centered">
                <div class="login">
                    <div class="box">
                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
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
                            <h5>Please login using your existing account</h5>
                        </div>
                        <div class="box-content">
                            <div class="row-fluid">
                                <?= $form->field($model, 'username')?>
                                <?= $form->field($model, 'password')->passwordInput() ?>
                                <?= $form->field($model, 'rememberMe', [
                                    'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                ])->checkbox()
                                ?>
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="pull-left">
                                <button type="submit" class="btn btn-primary btn-small" name="login" value="Login">
                                    Login
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