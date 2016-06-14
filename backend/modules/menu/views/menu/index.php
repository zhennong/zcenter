<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\menu\models\MenuSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menu Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table table-hover">
        <thead >
            <tr>
                <td>菜单ID</td>
                <td>菜单名称</td>
                <td>菜单路由</td>
                <td>操作菜单</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($wire as $w){?>
            <tr>
                <td><?=$w['id']?></td>
                <td><?=$w['prefix'].$w['name']?></td>
                <td><?=$w['router']?></td>
                <td>
                    <a href="#" class="btn btn-link">添加子菜单</a>|
                    <a href="#" class="btn btn-link">修改</a>|
                    <a href="#" class="btn btn-link">删除</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
        <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tfoot>
    </table>
</div>
