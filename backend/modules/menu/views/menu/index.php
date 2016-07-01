<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-model-index">

    <h1>应用列表</h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'appname',
            'appuri',
            'app_authuri',
            'description',
            [
                'label'=>'菜单目录',
                'format'=>'raw',
                'value' => function($data){
                    return Html::a('查看', ['menu/menus','aid'=>$data->id], ['class' => 'btn btn-success btn-sm']);
                }
            ],
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'header' => '操作',
//            ],
        ],
    ]); ?>
</div>
