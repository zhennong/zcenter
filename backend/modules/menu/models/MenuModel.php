<?php

namespace backend\modules\menu\models;

use Yii;

/**
 * This is the model class for table "zn_rule_menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $appid
 * @property integer $parentid
 * @property string $router
 * @property integer $listorder
 * @property integer $display
 */
class MenuModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zn_rule_menu';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appid'], 'required'],
            [['appid', 'parentid', 'listorder', 'display'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['router'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => '菜单ID',
            'name'      => '菜单名称',
            'appid'     => '应用ID',
            'parentid'  => '父ID',
            'router'    => '路由',
            'listorder' => '排序值',
            'display'   => '是否显示',
        ];
    }
    

}
