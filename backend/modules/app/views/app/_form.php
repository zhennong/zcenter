<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\app\models\AppModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'appname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'appuri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'app_authuri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'appauthkey',[
        'template' => "<div class=\"input-group\">
                        <span class=\"input-group-addon\"><a id='rand'>点击生成随机密钥</a></span>
                        {input}
                        </div>"
    ])->textInput(['maxlength' => true,'id'=>'appkey']) ?>

    <input type="hidden" id="url" value="<?=Url::toRoute(['/app/app/rand-str'])?>">
    <input type="hidden" id="token" value="<?=Yii::$app->request->csrfToken?>">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?=Html::jsFile('backend/web/js/app/randstr.js')?>
</div>
