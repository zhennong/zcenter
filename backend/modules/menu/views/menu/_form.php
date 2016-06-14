<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\menu\models\MenuModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-model-form">

    <?php $form = ActiveForm::begin(); ?>
    <label class="control-label" for="menumodel-name"><?=Yii::t('common','Parent Menu')?></label>
    <select class="form-control" name="parentid">
        <?php if(!isset($pid)){?>
            <option value=0><?=Yii::t('common','As First Menu')?></option>
        <?php }?>
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
