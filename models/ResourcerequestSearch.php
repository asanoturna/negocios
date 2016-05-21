<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resourcerequest;

/**
 * ResourcerequestSearch represents the model behind the search form about `app\models\Resourcerequest`.
 */
class ResourcerequestSearch extends Resourcerequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'has_transfer', 'receive_credit', 'add_insurance', 'location_id', 'user_id', 'resource_type_id', 'resource_purpose_id', 'resource_status_id'], 'integer'],
            [['created', 'client_name', 'client_phone', 'expiration_register', 'lastupdate_register', 'observation', 'requested_month', 'requested_year'], 'safe'],
            [['value_request', 'value_capital'], 'number'],
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
        $query = Resourcerequest::find();

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
            'value_request' => $this->value_request,
            'expiration_register' => $this->expiration_register,
            'lastupdate_register' => $this->lastupdate_register,
            'value_capital' => $this->value_capital,
            'has_transfer' => $this->has_transfer,
            'receive_credit' => $this->receive_credit,
            'add_insurance' => $this->add_insurance,
            'location_id' => $this->location_id,
            'user_id' => $this->user_id,
            'resource_type_id' => $this->resource_type_id,
            'resource_purpose_id' => $this->resource_purpose_id,
            'resource_status_id' => $this->resource_status_id,
        ]);

        $query->andFilterWhere(['like', 'client_name', $this->client_name])
            ->andFilterWhere(['like', 'client_phone', $this->client_phone])
            ->andFilterWhere(['like', 'observation', $this->observation])
            ->andFilterWhere(['like', 'requested_month', $this->requested_month])
            ->andFilterWhere(['like', 'requested_year', $this->requested_year]);

        return $dataProvider;
    }
}
