<?php

namespace app\modules\campaign\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\campaign\models\Sicoobcard;

class SicoobcardSearch extends Sicoobcard
{
    public function rules()
    {
        return [
            [['id', 'purchaselocal', 'product_type', 'user_id'], 'integer'],
            [['name', 'card', 'purchasedate', 'created', 'updated'], 'safe'],
            [['purchasevalue'], 'number'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Sicoobcard::find();

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
            'purchasedate' => $this->purchasedate,
            'purchasevalue' => $this->purchasevalue,
            'purchaselocal' => $this->purchaselocal,
            'product_type' => $this->product_type,
            'created' => $this->created,
            'updated' => $this->updated,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'card', $this->card]);

        return $dataProvider;
    }
}