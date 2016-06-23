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
    const STATUS_FAIL = 'login';
    const STATUS_SUCCESS = 'success';

    const MASSAGE_LOGIN_ERROR = 'login_error';
    const MASSAGE_TOKEN_ERROR = 'token_error';
    const MASSAGE_TOKEN_NULL = 'token_null';
    /**
     * POST请求方法是login，则验证username、password
     *      1,成功返回token,状态：success
     *      2,失败返回错误信息：login_error,状态：login
     * 请求头Authorization:Bearer token
     *      1,不存在返回错误信息：token_null,状态:login
     *      2,验证失败返回状态：token_error
     */
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