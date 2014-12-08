<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Customer login';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Login / Register -->
<section class="login_register">


    <div class="container">
        <div class="row">
            <div class="span6">
                <!-- Login -->
                <div class="login">
                    <div class="box">


                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'fieldConfig' => [
                                'template' => "<div class=\"span6\">\n<div class=\"control-group\">
                                    {label}\n<div class=\"controls\">{input}\n<div class=\"col-lg-3\">{error}</div></div></div></div>",
                                'labelOptions' => ['class' => 'control-label'],
                            ],
                        ]); ?>

                        <div class="hgroup title">
                            <h3><?= Html::encode($this->title) ?></h3>
                            <h5>Please login using your existing account</h5>
                        </div>

                        <div class="box-content">
                            <div class="row-fluid">
                                <?= $form->field($model, 'email')->input('email')  ?>
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
                <!-- End class="login" -->
            </div>

            <div class="span6">
                <!-- Register -->
                <div class="register">
                    <div class="box">
                        <div class="hgroup title">
                            <h3>Want to Register?</h3>
                            <h5>Registration allows you to avoid filling in billing and shipping forms every time you
                                checkout on this website. You'll also be able to track your orders with ease!</h5>
                        </div>

                        <div class="buttons">
                            <div class="pull-left">
                                <a href="#register" class="btn btn-small" data-toggle="modal">
                                    Register now &nbsp; <i class="icon-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End class="register" -->                            </div>
        </div>
    </div>

    <!-- Register modal window -->
    <div id="register" class="modal hide fade" tabindex="-1">

        <form onsubmit="return false;" enctype="multipart/form-data" action="#" method="post">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="hgroup title">
                    <h3>Register now</h3>
                    <h5>Registered users get access to features such as order history and so much more!</h5>
                </div>
            </div>

            <div class="modal-body">

                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="first_name">First name</label>

                            <div class="controls">
                                <input class="span12" type="text" id="first_name" name="first_name" value=""/>
                            </div>
                        </div>
                    </div>

                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="last_name">Last name</label>

                            <div class="controls">
                                <input class="span12" type="text" id="last_name" name="last_name" value=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="email">Email address</label>

                            <div class="controls">
                                <input class="span12" type="text" id="email" name="email" value=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="password">Password</label>

                            <div class="controls">
                                <input class="span12" type="password" id="password" name="password" autocomplete="off"/>
                            </div>
                        </div>
                    </div>

                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label" for="password_confirm">Password confirm</label>

                            <div class="controls">
                                <input class="span12" type="password" id="password_confirm" name="password_confirm"
                                       autocomplete="off"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-small" name="signup" value="Register">
                    Register now &nbsp; <i class="icon-ok"></i>
                </button>
            </div>

        </form>
    </div>
    <!-- End Register modal window -->
</section>
<!-- End Login / Register -->

<!---->
<!--<div class="site-login">-->
<!--    --><?php //$form = ActiveForm::begin([
//        'id' => 'login-form',
//        'options' => ['class' => 'form-horizontal'],
//        'fieldConfig' => [
//            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//            'labelOptions' => ['class' => 'col-lg-1 control-label'],
//        ],
//    ]);
?>
<!---->
<!--    --><? //= $form->field($model, 'email')->input('email')  ?>
<!---->
<!--    --><? //= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'rememberMe', [
//        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//    ])->checkbox()
?>
<!---->
<!--    <div class="form-group">-->
<!--        <div class="col-lg-offset-1 col-lg-11">-->
<!--            --><? //= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<!--        </div>-->
<!--    </div>-->
<!---->
<?php //ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">-->
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>-->
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.-->
    </div>
</div>
