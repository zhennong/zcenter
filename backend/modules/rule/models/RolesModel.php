<?php

namespace backend\modules\rule\models;

use Yii;

/**
 * This is the model class for table "zn_rule_roles".
 *
 * @property integer $roleid
 * @property string $rolename
 * @property string $description
 */
class RolesModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zn_rule_roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rolename'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roleid' => 'Roleid',
            'rolename' => 'Rolename',
            'description' => 'Description',
        ];
    }
}
