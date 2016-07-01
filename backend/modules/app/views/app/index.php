<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '应用管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加应用', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'appname',
            'appuri',
            'app_authuri',
            'description',
            'appauthkey',
            [
                'label'=>'菜单目录',
                'format'=>'raw',
                'value' => function(){
                    $url = "";
                    return Html::a('查看', ['app/menus' ,'id'=>1], ['class' => 'btn btn-success btn-sm']);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
            ],
        ],
    ]); ?>
</div>
