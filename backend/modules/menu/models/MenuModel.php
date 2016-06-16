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
    public  $cat = [];
    //前缀样式
    public $left   = "&nbsp;";
    public $center = " │ &nbsp;&nbsp;&nbsp;";
    public $right  = " ├─ &nbsp;";

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zn_rule_menu';
    }

    
    /**
     * MenuModel constructor.
     * @param array $param 可传入appid,id,display参数获取对应的二维数组,
     * @return  $this->cat 数据可调用自身cat属性。
     */
    public function __construct(array $param=[])
    {
        parent::__construct();
        //如果检测到id,说明为节点查询
        if(isset($param['id'])){
            $this->cat[] = $this->find()->where($param)->asArray()->one();
            $param['parentid'] = $param['id'];
            unset($param['id']);
            $this->cat = array_merge($this->cat,$this->find()->where($param)->orderBy('parentid,listorder')->asArray()->all());
        }else{
            $this->cat = $this->find()->where($param)->orderBy('parentid,listorder')->asArray()->all();
        }

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

    /**
     * 样式菜单 (暂不支持节点样式菜单)
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
