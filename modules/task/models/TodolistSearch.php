<?php

namespace app\modules\task\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\task\models\Todolist;

class TodolistSearch extends Todolist
{
    public function rules()
    {
        return [
            [['id', 'department_id', 'category_id', 'status_id', 'priority', 'owner_id', 'responsible_id', 'is_done'], 'integer'],
            [['name', 'description', 'deadline', 'created', 'updated'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Todolist::find();

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
            'department_id' => $this->department_id,
            'category_id' => $this->category_id,
            'status_id' => $this->status_id,
            'deadline' => $this->deadline,
            'priority' => $this->priority,
            'owner_id' => $this->owner_id,
            'responsible_id' => $this->responsible_id,
            'is_done' => $this->is_done,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
