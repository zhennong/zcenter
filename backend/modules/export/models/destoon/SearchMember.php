<?php

namespace backend\modules\export\models\destoon;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\export\models\destoon\Member;

/**
 * SearchMember represents the model behind the search form about `backend\modules\export\models\destoon\Member`.
 */
class SearchMember extends Member
{
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
    public function search($params,$count)
    {
        if($count ==1)
        {
            $query = Member::findBySql("select *,count(logintime) as count from destoon_member GROUP BY mobile HAVING count=1 limit 100")->asArray();
        }else{
            $query = Member::findBySql("SELECT mobile, count(*) as count  FROM destoon_member GROUP BY mobile HAVING  count > 1  ORDER BY count DESC")->asArray();
        }
//        GROUP BY mobile HAVING count=1
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }
        return $dataProvider;
    }
}
