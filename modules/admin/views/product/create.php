<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductModel */

$this->title = 'Create product';
?>
<?= $this->render('../default/box_header') ?>
<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

<?= $this->render('../default/box_footer') ?>
