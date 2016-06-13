<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\menu\models\MenuModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-model-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $css='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'?>

    <select class="form-control" name="parentid">
        <option value="" selected="selected">请选择父级菜单</option>
        <option style="padding-left: 20px;" value=0>顶级菜单</option>
        <?php foreach ($wire as $w){?>
            <?php if($w['lv'] == 1){?>
                <option value=<?=$w['id']?>>
                    <?=$css?>┠ &nbsp;&nbsp;<?=$w['name']?>
                </option>
            <?php }else{?>
                <option value=<?=$w['id']?>>
                    <?=str_repeat($css,$w['lv'])?>└ &nbsp;&nbsp;<?=$w['name']?>
                </option>
            <?php }?>
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
