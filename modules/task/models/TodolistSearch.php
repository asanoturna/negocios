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
            [['id', 'department_id', 'category_id', 'status_id', 'priority_id', 'owner_id', 'responsible_id', 'co_responsible_id','notification_deadline'], 'integer'],
            [['name', 'description', 'deadline', 'created', 'updated'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Todolist::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC, 
                ]
            ],
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'department_id' => $this->department_id,
            'category_id' => $this->category_id,
            'status_id' => $this->status_id,
            'deadline' => $this->deadline,
            'priority_id' => $this->priority_id,
            'owner_id' => $this->owner_id,
            'responsible_id' => $this->responsible_id,
            'co_responsible_id' => $this->co_responsible_id,
            'is_done' => $this->is_done,
            'created' => $this->created,
            'updated' => $this->updated,
            'notification_deadline' => $this->notification_deadline,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
