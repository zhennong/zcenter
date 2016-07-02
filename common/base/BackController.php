<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/29
 * Time: 8:48
 */

namespace common\base;

use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
class BackController extends Controller
{
    private $showMessageRoute = '';

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action))
        {
            return false;
        }

        // 检查不需要登陆的action，如login、signup、captcha
        if (in_array($action->uniqueId, $this->ignoreLogin()))
        {
            return parent::beforeAction($action);
        }

        // 未登录，跳转到不同应用主体配置的loginUrl登陆页面
        if (Yii::$app->user->isGuest)
        {
            return $this->go();
        }

        // 查找应用主体配置文件中的showMessageRoute，如果未配置返回false
        if (Yii::$app->params['showMessageRoute'])
        {
            $this->showMessageRoute = Yii::$app->params['showMessageRoute'];
        } else {
            return false;
        }
        return true;
    }

    public function ignoreLogin()
    {
        return Yii::$app->params['ignoreLogin'];
    }

    public function go()
    {
        $this->redirect(Yii::$app->user->loginUrl);
    }

    public function showMessage($message = null, $title = '提示', $params = [])
    {
        if (!$message)
        {
            $message = '您无法进行此操作';
        }
        $params=array_merge(['title'=>$title,'message'=>$message],$params);

        return $this->render($this->showMessageRoute,$params);
    }

}