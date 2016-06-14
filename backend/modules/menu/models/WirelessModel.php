<?php
namespace backend\modules\menu\models;


use backend\modules\menu\models\MenuModel;

/**
 * 无线及分类菜单
 */

class WirelessModel {

    public $cat   = [];
    //前缀样式符
    public $left   = "&nbsp;";
    public $center = " │ &nbsp;&nbsp;&nbsp;";
    public $right  = " ├─ &nbsp;";


    public  function __construct()
    {
        $this->cat = MenuModel::find()->orderBy('parentid,listorder')->asArray()->all();
    }
    /**
     * 下拉菜单
     * @param  $pd父级id，默认为0, $lv为层级值，同级值相等;
     * @return array 排好顺序的二位数组;
     */
    public function option($pd=0,$lv=0){
        $data = [];
        foreach ($this->cat as $c){
            if ($c['parentid'] == $pd){
                $c['lv']     = $lv;
                if ($c['lv']>0){
                    if ($c['lv'] -1 >0){
                        $c['prefix'] = $this->left.str_repeat($this->center,$c['lv']-1).$this->right;
                    }else{
                        $c['prefix'] = $this->left.$this->right;
                    }
                }else{
                    $c['prefix'] = "";
                }
                $data[]  = $c;
                $data = array_merge($data,$this->option($c['id'],$lv+1));
            }
        }
        return $data;
    }







}