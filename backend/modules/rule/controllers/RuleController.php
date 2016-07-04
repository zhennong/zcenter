<?php

namespace backend\modules\rule\controllers;

use Yii;
use common\models\RuleModel;
use backend\modules\rule\models\RuleSearchModel;
use common\base\BackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RuleController implements the CRUD actions for RuleModel model.
 */
class RuleController extends BackController
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
     * Lists all RuleModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RuleSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RuleModel model.
     * @param string $roleid
     * @return mixed
     */
    public function actionView($roleid)
    {
        return $this->render('view', [
            'model' => $this->findModel($roleid),
        ]);
    }

    /**
     * Creates a new RuleModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RuleModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'roleid' => $model->roleid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RuleModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $roleid
     * @return mixed
     */
    public function actionUpdate($roleid)
    {
        $model = $this->findModel($roleid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'roleid' => $model->roleid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RuleModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $roleid
     * @return mixed
     */
    public function actionDelete($roleid)
    {
        $this->findModel($roleid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RuleModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $roleid
     * @return RuleModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($roleid)
    {
        if (($model = RuleModel::findOne($roleid)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
