<?php

namespace app\modules\client\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\client\models\Base;

class BaseSearch extends Base
{
    public function rules()
    {
        return [
            [['account', 'value', 'quota', 'category_id'], 'required'],
            [['id'], 'integer'],
            [['account','value', 'quota', 'category_id', 'name','doc'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        if (!($this->load($params) && $this->validate())) {
            $query = Base::find()->where('1 <> 1');
            $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        } else {
        $query = Base::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC, 
                ]
            ],
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'account' => $this->account,
        ]);

        }
        return $dataProvider;
    }

    public function detail($params)
    {
        $query = Base::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC, 
                ]
            ],
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'account' => $this->account,
            'value' => $this->value,
        ]);


        return $dataProvider;
    }

}
