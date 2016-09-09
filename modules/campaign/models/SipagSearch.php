<?php

namespace app\modules\campaign\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\campaign\models\Sipag;

class SipagSearch extends Sipag
{
    public function rules()
    {
        return [
            [['id', 'establishmenttype', 'visited', 'accredited', 'status', 'locked', 'anticipation', 'status', 'user_id', 'checkedby'], 'integer'],
            [['establishmentname', 'address', 'date', 'created', 'updated','observation'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Sipag::find();

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
            'created' => $this->created,
            'updated' => $this->updated,
            'establishmenttype' => $this->establishmenttype,
            'date' => $this->date,
            'visited' => $this->visited,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'establishmentname', $this->establishmentname])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'observation', $this->observation]);;

        return $dataProvider;
    }
}