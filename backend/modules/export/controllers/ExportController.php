<?php

namespace backend\modules\export\controllers;

use Yii;
use backend\modules\export\models\destoon\Member;
use backend\modules\export\models\destoon\SearchMember;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db;

/**
 * MemberController implements the CRUD actions for Member model.
 */
class ExportController extends Controller
{
    /**
     * @inheritdoc
     */
//    public $layout = 'main';
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
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchMember();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,1)->getModels();
//        $dataProvider2 = $searchModel->search(Yii::$app->request->queryParams,0)->getModels();
//        $count = count($dataProvider);
        foreach($dataProvider as $k=>$v){
            $dataProvider_list[$k]=$v;
            $sql =  "INSERT INTO destoon_member(`userid`) VALUE (".$v['userid'].");<br/>";
//            echo $sql;
        }
        return $this->render('index');
    }
}
