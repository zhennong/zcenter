<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\rule\models\RolesModel */

$this->title = '更新《 ' . $model->rolename . '》';
$this->params['breadcrumbs'][] = ['label' => '角色管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rolename];
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
