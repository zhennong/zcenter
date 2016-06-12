<?php

namespace backend\modules\rule\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\rule\models\RuleModel;

/**
 * RuleSearchModel represents the model behind the search form about `backend\modules\rule\models\RuleModel`.
 */
class RuleSearchModel extends RuleModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'permission', 'appid'], 'integer'],
            [['name', 'router'], 'safe'],
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
        $query = RuleModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'permission' => $this->permission,
            'appid' => $this->appid,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'router', $this->router]);

        return $dataProvider;
    }
}
