<?php

namespace backend\modules\export\models\destoon;

use Yii;

/**
 * This is the model class for table "{{%member}}".
 *
 * @property string $userid
 * @property string $username
 * @property string $passport
 * @property string $company
 * @property string $password
 * @property double $cash
 * @property string $payword
 * @property string $email
 * @property integer $message
 * @property integer $chat
 * @property integer $sound
 * @property integer $online
 * @property integer $avatar
 * @property integer $gender
 * @property string $truename
 * @property string $mobile
 * @property string $msn
 * @property string $qq
 * @property string $ali
 * @property string $skype
 * @property string $department
 * @property string $career
 * @property integer $admin
 * @property string $role
 * @property string $aid
 * @property integer $groupid
 * @property integer $regid
 * @property string $areaid
 * @property integer $sms
 * @property integer $credit
 * @property string $money
 * @property string $locking
 * @property string $bank
 * @property string $account
 * @property string $edittime
 * @property string $regip
 * @property string $regtime
 * @property string $loginip
 * @property string $logintime
 * @property string $logintimes
 * @property string $black
 * @property integer $send
 * @property string $auth
 * @property string $authvalue
 * @property string $authtime
 * @property integer $vemail
 * @property integer $vmobile
 * @property integer $vtruename
 * @property integer $vbank
 * @property integer $vcompany
 * @property integer $vtrade
 * @property string $trade
 * @property string $support
 * @property string $inviter
 * @property string $tel
 * @property integer $is_agent
 * @property string $vip
 * @property double $bl
 * @property string $touxiang
 * @property integer $topagentid
 * @property integer $usertype
 * @property string $userbak
 * @property integer $regareaid
 * @property string $comefrom
 * @property string $begoodatcatid
 * @property integer $experttype
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_nongyao001');
    }
    
}
