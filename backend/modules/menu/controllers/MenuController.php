<?php

namespace backend\modules\menu\controllers;

use Yii;
use backend\modules\menu\models\MenuModel;
use backend\modules\menu\models\MenuSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
     * Lists all MenuModel models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new MenuSearchModel();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new MenuModel();
        $cats  = $model->option();
//        $dataProvider = $model->cat;
        return $this->render('index', [
//            'dataProvider' => $dataProvider,
              'cats' => $cats,
        ]);
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
        $cats      = $model->option();
        $pid       = null;
        $aid       = null;
        //获取地址参数id的值
        $id        = Yii::$app->getRequest()->getQueryParam('id');
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
        $cats  = $model->option();
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
}
