<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\menu\models\MenuSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'appid') ?>

    <?= $form->field($model, 'parentid') ?>

    <?= $form->field($model, 'router') ?>

    <?php // echo $form->field($model, 'listorder') ?>

    <?php // echo $form->field($model, 'display') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
