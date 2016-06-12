<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                    <?= $form->field($model, 'rememberMe')->checkbox(['template'=>'{input} 记住密码'])->label(false) ?>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div>
        <!-- /.col -->
    </div>
<?php ActiveForm::end(); ?>
