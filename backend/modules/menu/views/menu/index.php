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
                <td><?=Yii::t('common','Menu ID')?></td>
                <td><?=Yii::t('common','Menu Name')?></td>
                <td><?=Yii::t('common','Router')?></td>
                <td><?=Yii::t('common','Menu Operation')?></td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($wire as $w){?>
            <tr>
                <td><?=$w['id']?></td>
                <td><?=$w['prefix'].$w['name']?></td>
                <td><?=$w['router']?></td>
                <td>
                    <a href="<?=Url::to(['menu/update','id'=>$w['id']])?>" class="btn btn-link">添加子菜单</a>|
                    <a href="<?=Url::to(['menu/update','id'=>$w['id']])?>" class="btn btn-link">修改</a>|
                    <a href="<?=Url::to(['menu/delete','id'=>$w['id']])?>" class="btn btn-link">删除</a>
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
