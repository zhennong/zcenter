<?php

use yii\helpers\Html;

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
        <?php foreach ($cats as $w){?>
            <tr>
                <td><?=$w['id']?></td>
                <td><?=$w['prefix'].$w['name']?></td>
                <td><?=$w['router']?></td>
                <td>
                    <?= Html::a('添加子菜单', ['menu/create','id'=>$w['id']],['class' => 'btn btn-link']);?>|
                    <?= Html::a('修改', ['menu/update','id'=>$w['id']],['class' => 'btn btn-link']);?>|
                    <?= Html::a('删除', ['menu/delete','id'=>$w['id']],['class' => 'btn btn-link', 'data-method'=>'post']);?>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
