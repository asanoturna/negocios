<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Managerdailyproductivity;

class ManagerdailyproductivitySearch extends Managerdailyproductivity
{

    public function rules()
    {
        return [
            [['id', 'product_id', 'modality_id', 'location_id', 'person_id', 'daily_productivity_status_id', 'seller_id', 'operator_id'], 'integer'],
            [['buyer_document', 'buyer_name', 'date', 'created', 'updated'], 'safe'],
            [['valor', 'commission_percent', 'companys_revenue'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Managerdailyproductivity::find();

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
            'product_id' => $this->product_id,
            'modality_id' => $this->modality_id,
            'location_id' => $this->location_id,
            'person_id' => $this->person_id,
            'valor' => $this->valor,
            'commission_percent' => $this->commission_percent,
            'companys_revenue' => $this->companys_revenue,
            'daily_productivity_status_id' => $this->daily_productivity_status_id,
            'seller_id' => $this->seller_id,
            'operator_id' => $this->operator_id,
            'date' => $this->date,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'buyer_document', $this->buyer_document])
            ->andFilterWhere(['like', 'buyer_name', $this->buyer_name]);

        return $dataProvider;
    }
}
