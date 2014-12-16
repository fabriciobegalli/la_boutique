<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CategoryModel */

$this->title = 'Create new category';
?>

<?= $this->render('../default/box_header') ?>
    <h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
<?= $this->render('../default/box_footer') ?>