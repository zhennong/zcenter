<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\rule\models\RuleModel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rule Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'roleid' => $model->roleid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'roleid' => $model->roleid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'roleid',
            'permission',
            'name',
            'router',
            'appid',
        ],
    ]) ?>

</div>
