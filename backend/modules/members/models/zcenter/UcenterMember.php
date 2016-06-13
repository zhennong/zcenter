<?php

namespace backend\modules\members\models\zcenter;

use Yii;

/**
 * This is the model class for table "{{%ucenter_member}}".
 *
 * @property integer $userid
 * @property string $mobile
 * @property string $password
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 * @property integer $appid
 * @property string $hash
 * @property integer $last_login_time
 * @property string $bind_username
 */
class UcenterMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ucenter_member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'password', 'status', 'addtime', 'appid', 'last_login_time'], 'required'],
            [['status', 'addtime', 'updatetime', 'appid', 'last_login_time'], 'integer'],
            [['mobile'], 'string', 'max' => 11],
            [['password'], 'string', 'max' => 32],
            [['hash', 'bind_username'], 'string', 'max' => 50],
            [['mobile'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'mobile' => 'Mobile',
            'password' => 'Password',
            'status' => 'Status',
            'addtime' => 'Addtime',
            'updatetime' => 'Updatetime',
            'appid' => 'Appid',
            'hash' => 'Hash',
            'last_login_time' => 'Last Login Time',
            'bind_username' => 'Bind Username',
        ];
    }
}
