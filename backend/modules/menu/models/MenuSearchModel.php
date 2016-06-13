<?php

namespace backend\modules\menu\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\menu\models\MenuModel;

/**
 * MenuSearchModel represents the model behind the search form about `backend\modules\menu\models\MenuModel`.
 */
class MenuSearchModel extends MenuModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'appid', 'parentid', 'listorder', 'display'], 'integer'],
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
        $query = MenuModel::find();

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
            'appid' => $this->appid,
            'parentid' => $this->parentid,
            'listorder' => $this->listorder,
            'display' => $this->display,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'router', $this->router]);

        return $dataProvider;
    }
}
