<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\members\models\destoon\SearchMember */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userid',
            'username',
            'passport',
            'company',
            'password',
            // 'cash',
            // 'payword',
            // 'email:email',
            // 'message',
            // 'chat',
            // 'sound',
            // 'online',
            // 'avatar',
            // 'gender',
            // 'truename',
            // 'mobile',
            // 'msn',
            // 'qq',
            // 'ali',
            // 'skype',
            // 'department',
            // 'career',
            // 'admin',
            // 'role',
            // 'aid',
            // 'groupid',
            // 'regid',
            // 'areaid',
            // 'sms',
            // 'credit',
            // 'money',
            // 'locking',
            // 'bank',
            // 'account',
            // 'edittime',
            // 'regip',
            // 'regtime',
            // 'loginip',
            // 'logintime',
            // 'logintimes',
            // 'black',
            // 'send',
            // 'auth',
            // 'authvalue',
            // 'authtime',
            // 'vemail:email',
            // 'vmobile',
            // 'vtruename',
            // 'vbank',
            // 'vcompany',
            // 'vtrade',
            // 'trade',
            // 'support',
            // 'inviter',
            // 'tel',
            // 'is_agent',
            // 'vip',
            // 'bl',
            // 'touxiang',
            // 'topagentid',
            // 'usertype',
            // 'userbak',
            // 'regareaid',
            // 'comefrom',
            // 'begoodatcatid',
            // 'experttype',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
