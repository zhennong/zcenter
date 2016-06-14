<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\app\models\AppModel */

$this->title = 'Update App Model: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'App Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
