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
            //[['account', 'value', 'quota', 'category_id'], 'required'],
            [['id'], 'integer'],
            ['account', 'is6NumbersOnly'],
            ['value', 'isValueOnly'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            ['quota', 'number', 'min' => 1, 'max' => 60],
            ['value', 'number', 'min' => 1],
            [['account','value', 'quota', 'category_id', 'name','doc'], 'safe'],
        ];
    }

    public function is6NumbersOnly($attribute)
    {
        if (!preg_match('/^[0-9]{6}$/', $this->$attribute)) {
            $this->addError($attribute, 'Conta possui 6 digitos numéricos');
        }
    }

    public function isValueOnly($attribute)
    {
        if (!preg_match('/^[1-9][0-9]*$/', $this->$attribute)) {
            $this->addError($attribute, '"Valor" precisa ser um número inteiro maior que zero!');
        }
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

    public function index($params)
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
            'category_id' => $this->category_id,
        ]);


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
