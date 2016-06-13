<?php

namespace backend\modules\rule\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\rule\models\RolesModel;

/**
 * RolesSearchModel represents the model behind the search form about `backend\modules\rule\models\RolesModel`.
 */
class RolesSearchModel extends RolesModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roleid'], 'integer'],
            [['rolename', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RolesModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10,],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'roleid' => $this->roleid,
        ]);

        $query->andFilterWhere(['like', 'rolename', $this->rolename])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
