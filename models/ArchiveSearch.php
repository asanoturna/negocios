<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Archive;

class ArchiveSearch extends Archive
{
    public function rules()
    {
        return [
            [['id', 'archivecategory_id', 'downloads', 'filesize', 'status', 'user_id'], 'integer'],
            [['name', 'attachment', 'description', 'created', 'updated', 'filetype'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Archive::find();

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
            'archivecategory_id' => $this->archivecategory_id,
            'downloads' => $this->downloads,
            'filesize' => $this->filesize,
            'created' => $this->created,
            'updated' => $this->updated,
            'status' => $this->status,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'attachment', $this->attachment])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'filetype', $this->filetype]);

        return $dataProvider;
    }
}