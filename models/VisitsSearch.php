<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visits;

/**
 * VisitsSearch represents the model behind the search form about `app\models\Visits`.
 */
class VisitsSearch extends Visits
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'num_proposal', 'visits_finality_id', 'visits_status_id', 'person_id', 'location_id', 'user_id'], 'integer'],
            [['date', 'responsible', 'company_person', 'contact', 'email', 'phone', 'observation', 'created', 'updated', 'ip', 'attachment', 'localization_map'], 'safe'],
            [['value'], 'number'],
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
        $query = Visits::find();

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
            'date' => $this->date,
            'value' => $this->value,
            'num_proposal' => $this->num_proposal,
            'created' => $this->created,
            'updated' => $this->updated,
            'visits_finality_id' => $this->visits_finality_id,
            'visits_status_id' => $this->visits_status_id,
            'person_id' => $this->person_id,
            'location_id' => $this->location_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'responsible', $this->responsible])
            ->andFilterWhere(['like', 'company_person', $this->company_person])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'observation', $this->observation])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'attachment', $this->attachment])
            ->andFilterWhere(['like', 'localization_map', $this->localization_map]);

        return $dataProvider;
    }
}
