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
            'id'        => Yii::t('common','ID'),
            'name'      => Yii::t('common','Menu Name'),
            'appid'     => Yii::t('common','Appid'),
            'parentid'  => Yii::t('common','Parentid'),
            'router'    => Yii::t('common','Router'),
            'listorder' => Yii::t('common','Listorder'),
            'display'   => Yii::t('common','Display'),
        ];
    }



}
