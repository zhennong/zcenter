<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\rule\models\RuleModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rule-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'permission')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'router')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'appid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
