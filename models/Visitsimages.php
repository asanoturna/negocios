<?php

namespace app\models;

use Yii;

class Visitsimages extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'visits_images';
    }

    public function rules()
    {
        return [
            [['name', 'business_visits_id'], 'required'],
            [['business_visits_id'], 'integer'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Imagem',
            'business_visits_id' => 'Nº da Visita',
        ];
    }

    public function getBusinessVisits()
    {
        return $this->hasOne(BusinessVisits::className(), ['id' => 'business_visits_id']);
    }
}
