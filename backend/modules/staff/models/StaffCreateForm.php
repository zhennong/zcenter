<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/19
 * Time: 22:01
 */

namespace backend\modules\staff\models;


use yii\db\ActiveRecord;

class StaffCreateForm extends ActiveRecord
{
    public $username;
    public $truename;
    public $email;
    public $password;
    public $repassword;
    public $status;

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'truename' => '真实名称',
            'email' => '邮箱',
            'password' => '密码',
            'repassword' => '确认密码',
            'status' => '状态',
        ];
    }

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['truename', 'filter', 'filter' => 'trim'],
            ['truename', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password', 'compare', 'compareAttribute'=>'repassword'],

            ['status', 'required'],
        ];
    }
}