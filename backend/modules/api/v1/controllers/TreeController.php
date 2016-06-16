<?php

namespace backend\modules\api\v1\controllers;

use backend\modules\rule\models\RolesModel;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class TreeController extends ActiveController
{
    public $modelClass = 'backend\modules\rule\models\RolesModel';

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'findModel' => [$this, 'findModel']
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction'
            ]
        ];
    }
    public function actionTest()
    {
//        $dataProvider = RolesModel::find()->all();
//        return $dataProvider;//MenuModel::findOne(1);
        return new ActiveDataProvider(array(
            'query' => RolesModel::find()
        ));
    }
    /**
     * @return ActiveDataProvider
     */
    public function prepareDataProvider()
    {
        return new ActiveDataProvider(array(
            'query' => RolesModel::findOne(1)
        ));
    }
    /**
     * @param $id
     * @return null|static
     * @throws NotFoundHttpException
     */
    public function findModel($id)
    {
        $model = RolesModel::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException;
        }
        return $model;
    }
}