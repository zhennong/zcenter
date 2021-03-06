<?php

namespace backend\modules\app\models;

use Yii;

/**
 * This is the model class for table "zn_app".
 *
 * @property integer $id
 * @property string $appname
 * @property string $appuri
 * @property string $app_authuri
 * @property string $description
 * @property string $appauthkey
 */
class AppModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zn_app';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appauthkey'], 'required'],
            [['appname'], 'string', 'max' => 50],
            [['appauthkey'],'string','max'=> 40],
            [['appuri', 'description'], 'string', 'max' => 100],
            [['app_authuri'], 'string', 'max' => 255],
        ];
    }

    /**
     * @property $appauthkey varchar
     */
    public static function findByAppauthkey($appauthkey){
        return static::findOne(['appauthkey' => $appauthkey]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'AppID',
            'appname' => '应用名称',
            'appuri' => '应用地址',
            'app_authuri' => '应用接口地址',
            'description' => '应用描述',
            'appauthkey'  => '随机密钥',
        ];
    }
}
