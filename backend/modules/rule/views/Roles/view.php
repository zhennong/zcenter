<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\rule\models\RolesModel */

$this->title = $model->roleid;
$this->params['breadcrumbs'][] = ['label' => 'Roles Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->roleid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->roleid], [
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
            'rolename',
            'description',
        ],
    ]) ?>

</div>
