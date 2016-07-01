<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\menu\models\MenuModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-model-form">

    <?php $form = ActiveForm::begin(); ?>
    <label class="control-label" for="menumodel-name">父级菜单</label>
    <select class="form-control" name="parentid">
        <option value=0>作为顶级菜单</option>

        <?php foreach ($cats as $w){?>
            <?php if($w['id'] == $pid){?>
                <option value="<?=$w['id']?>" selected="selected"><?=$w['prefix'].$w['name']?></option>
            <?php }else{?>
            <option value="<?=$w['id']?>"><?=$w['prefix'].$w['name']?></option>
            <?php }?>
        <?php }?>
    </select>

    <?php if(isset($aid)){?>
        <?= $form->field($model, 'appid')->textInput(['value'=>$aid]) ?>
    <?php }else {?>
        <?= $form->field($model, 'appid')->textInput() ?>
    <?php }?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'router')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'display')->radioList(['1' => '显示','0' => '隐藏']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
