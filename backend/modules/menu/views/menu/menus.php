<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\BaseHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\menu\models\MenuSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
$this->params['breadcrumbs'][] = $this->title; ?>
<div class="menu-model-index">

    <h1>应用</h1>
    <p>
        <?= Html::a('创建菜单', ['create'], ['class' => 'btn btn-success']) ?>
        <button class="btn btn-success" id="refresh">刷新排序</button>
        注: 修改排序值以后,点击刷新才能生效
    </p>
    <table class="table table-hover">
        <thead >
            <tr>
                <th>排序值</th>
                <th>菜单ID</th>
                <th>菜单名称</th>
                <th>路由</th>
                <th>应用名称</th>
                <th>菜单操作</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cats as $w){?>
            <tr>
                <td>
                    <input type="text" class='tests' name='<?=$w['id']?>' style="width: 30px; text-align: center;" value="<?=$w['listorder']?>">
                </td>
                <td><?=$w['id']?></td>
                <td><?=$w['prefix'].$w['name']?></td>
                <td><?=$w['router']?></td>
                <td><?=$w['appid']?></td>
                <td>
                    <?= Html::a('添加子菜单', ['menu/create','id'=>$w['id']],['class' => 'btn btn-link']);?>|
                    <?= Html::a('修改', ['menu/update','id'=>$w['id']],['class' => 'btn btn-link']);?>|
                    <a class="btn btn-link" onclick="del(<?=$w['id']?>)">删除</a>
                    <input type="hidden" id="url" value="<?=Url::toRoute(['/menu/menu/delete'])?>">
                    <input type="hidden" id="descs" value="<?=Url::toRoute(['/menu/menu/descs'])?>">
                    <input type="hidden" id="token" value="<?=Yii::$app->request->csrfToken?>">
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

