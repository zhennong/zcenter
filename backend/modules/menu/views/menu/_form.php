<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\menu\models\MenuModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <select class="form-control" name="parentid">
        <option value=0 selected="selected">作为一级菜单</option>
        <?php foreach ($wire as $w){?>
            <option value="<?=$w['id']?>"><?=$w['prefix'].$w['name']?></option>
        <?php }?>
    </select>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'appid')->textInput() ?>

    <?= $form->field($model, 'router')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'listorder')->textInput() ?>

    <?= $form->field($model, 'display')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
