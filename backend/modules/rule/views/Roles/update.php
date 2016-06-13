<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\rule\models\RolesModel */

$this->title = 'Update Roles Model: ' . $model->roleid;
$this->params['breadcrumbs'][] = ['label' => 'Roles Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->roleid, 'url' => ['view', 'id' => $model->roleid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roles-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
