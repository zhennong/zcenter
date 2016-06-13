<?php
namespace backend\modules\menu\models;

use backend\modules\menu\models\MenuModel;

/**
 * 无线及分类
 */

class WirelessModel extends \yii\db\ActiveRecord{

    public $cart = [];

    public  function __construct()
    {
        parent::__construct();
        $this->cart = MenuModel::find()->asArray()->all();
    }

    /**
     * 递归取出菜单
     * @param  $pd父级id，默认为0, $lv为层级值，同级值相等;
     * @return array 排好顺序的二位数组;
     */
    public function gets($pd=0,$lv=1){
        $data = [];
        foreach ($this->cart as $c){
            if ($c['parentid'] == $pd){
                $c['lv'] = $lv;
                $data[]  = $c;
                $data = array_merge($data,$this->gets($c['id'],$lv+1));
            }
        }
        return $data;
    }


}