<?php

namespace backend\modules\rule\models;

use Yii;

/**
 * This is the model class for table "zn_rule_rule".
 *
 * @property string $id
 * @property integer $permission
 * @property string $name
 * @property string $router
 * @property integer $appid
 */
class RuleModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zn_rule_rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['permission', 'appid'], 'required'],
            [['permission', 'appid'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['router'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'permission' => '规则状态',
            'name' => '规则名称',
            'router' => '路由URL',
            'appid' => '应用ID',
        ];
    }
}
