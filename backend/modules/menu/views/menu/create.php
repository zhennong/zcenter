<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\menu\models\MenuModel */

$this->title = '创建菜单';
$this->params['breadcrumbs'][] = ['label' => 'Menu Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cats'  => $cats,
        'pid'   => $pid,
        'aid'   => $aid,
    ]) ?>

</div>
