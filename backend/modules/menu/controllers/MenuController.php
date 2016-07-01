<?php

namespace backend\modules\menu\controllers;

use Yii;
use backend\modules\menu\models\MenuModel;
use backend\modules\menu\models\MenuSearchModel;
use yii\data\ActiveDataProvider;
use backend\modules\app\models\AppModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\TreeList;

/**
 * MenuController implements the CRUD actions for MenuModel model.
 */
class MenuController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * 应用列表
     */
    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query' => AppModel::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 应用菜单列表
     * @param integer $aid 应用Id
     * @return mixed
     */
    public function actionMenus($aid){

        if(!empty($aid)){
            $data = MenuModel::find()->where(['appid'=>$aid])->orderBy('parentid,listorder')->asArray()->all();
            $cats  = TreeList::getNews($data)->csList();
            return $this->render('menus', [
                'cats' => $cats,
            ]);
        }
    }

    /**
     * Displays a single MenuModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MenuModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model     = new MenuModel();
        $data      = $model->find()->orderBy('parentid,listorder')->asArray()->all();
        $cats      = TreeList::getNews($data)->csList();
        $pid       = null;
        $aid       = null;
        //如果是创建子菜单的话，获取地址参数id的值
        $id = Yii::$app->request->get('id');
        if ($id){
            $pid = $id;
            $aid = $model->findOne($id)->appid;
        }

        if ($model->load(Yii::$app->request->post())){
            $model->parentid =intval(Yii::$app->request->post()['parentid']);
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }else {
            return $this->render('create', [
                'model' => $model,
                'cats'  => $cats,
                'pid'   => $pid,
                'aid'   => $aid,
            ]);
        }
    }

    /**
     * Updates an existing MenuModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data  = $model->find()->orderBy('parentid,listorder')->asArray()->all();
        $cats  = TreeList::getNews($data)->csList();
        $pid   = $model->parentid;

        if ($model->load(Yii::$app->request->post())){
            $model->parentid = intval(Yii::$app->request->post()['parentid']);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'cats'  => $cats,
                'pid'   => $pid,
            ]);
        }
    }

    /**
     * Deletes an existing MenuModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->request->isAjax){
             $id = intval($id);
            if($this->findModel($id)->delete()){
                return 'ok';
            }else{
                return 'no';
            }
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MenuModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MenuModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MenuModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * 节点查询
     * @param $id,按栏目id查下面的数据 ,$did,默认值为1 = 显示的数据
     * @return array 返回排好序的显示的数组;
     * @throws NotFoundHttpException 已经隐藏或者找不到,
     */
    public function actionGetList($id , $did=1){
        $model  = new MenuModel();
        $one    = $model->find()->where(['id'=>$id,'display'=>$did])->asArray()->one();
        if ($one){
            $cats[] = $one;
            $data   = $model->find()->where(['appid'=>$one['appid'],'display'=>$did])->orderBy('parentid,listorder')->asArray()->all();
            $cats   = array_merge($cats,TreeList::getNews($data)->arList($id));
            return $cats;
        }else{
            throw new NotFoundHttpException('抱歉，找不到任何数据');
        }
    }

    /**
     * 排序值修改
     */
    public function actionDescs(){
        if (Yii::$app->request->isAjax){
            $data = (Yii::$app->request->post()['datas']);
            foreach ($data as $k => $v){
                $menu = $this->findModel($k);
                $menu->listorder = $v;
                if(!$menu->save()){
                    return '出错';
                }
            }
            return 'ok';
        }
    }


}
