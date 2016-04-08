<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reportbase;

/**
 * ReportbaseSearch represents the model behind the search form about `app\models\Reportbase`.
 */
class ReportbaseSearch extends Reportbase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'downloads'], 'integer'],
            [['filename', 'updated'], 'safe'],
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
        $query = Reportbase::find();

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
            'updated' => $this->updated,
            'downloads' => $this->downloads,
        ]);

        $query->andFilterWhere(['like', 'filename', $this->filename]);

        return $dataProvider;
    }
}
