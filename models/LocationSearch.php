<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Location;

class LocationSearch extends Location
{

    public function rules()
    {
        return [
            [['id', 'is_active'], 'integer'],
            [['shortname', 'fullname'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Location::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'shortname', $this->shortname])
            ->andFilterWhere(['like', 'fullname', $this->fullname]);

        return $dataProvider;
    }
}
