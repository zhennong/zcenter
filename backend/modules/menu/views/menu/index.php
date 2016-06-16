<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\menu\models\MenuSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建菜单', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table table-hover">
        <thead >
            <tr>
                <td>菜单ID</td>
                <td>菜单名称</td>
                <td>路由</td>
                <td>菜单操作</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cats as $w){?>
            <tr>
                <td><?=$w['id']?></td>
                <td><?=$w['prefix'].$w['name']?></td>
                <td><?=$w['router']?></td>
                <td>
                    <?= Html::a('添加子菜单', ['menu/create','id'=>$w['id']],['class' => 'btn btn-link']);?>|
                    <?= Html::a('修改', ['menu/update','id'=>$w['id']],['class' => 'btn btn-link']);?>|
                    <a class="btn btn-link" onclick="del(<?=$w['id']?>)">删除</a>
                    <input type="hidden" id="url" value="<?=Url::toRoute(['/menu/menu/delete'])?>">
                    <input type="hidden" id="token" value="<?=Yii::$app->request->csrfToken?>">
                </td>
            </tr>
        <?php }?>
        <?=Html::jsFile('backend/web/js/menu/delete.js')?>
        </tbody>
    </table>
</div>

