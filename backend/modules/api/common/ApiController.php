<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/16
 * Time: 17:32
 */

namespace backend\modules\api\common;

//use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public function init()
    {
        parent::init();
        // 请求http头未携带tonken返回login，或携带username、password，并访问的是user/login则不进行验证
//        $resquest = \Yii::$app->request;
//        $httpHeader = $resquest->getHeaders();
//        $apiurl = '';
//        if(empty($token) || (empty($username) && empty($password) && $apiurl == 'user/login')){
//            return 'login';
//        }
//
//        // token验证
//        if ($this->modelClass === null) {
//            throw new InvalidConfigException('The "modelClass" property must be set.');
//        }
    }
}