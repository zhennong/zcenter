<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zn_rule_rule".
 *
 * @property string $roleid
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
            [['appid'], 'required'],
            [['appid'], 'integer'],
            [['router'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roleid' => 'ID',
            'router' => '路由URL',
            'appid' => '应用ID',
        ];
    }
}
