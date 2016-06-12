<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\rule\models\RuleSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rule Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rule Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'permission',
            'name',
            'router',
            'appid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
