<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visits_images".
 *
 * @property integer $id
 * @property string $name
 * @property integer $business_visits_id
 *
 * @property BusinessVisits $businessVisits
 */
class Visitsimages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visits_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'business_visits_id'], 'required'],
            [['business_visits_id'], 'integer'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Imagem',
            'business_visits_id' => 'Nº da Visita',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessVisits()
    {
        return $this->hasOne(BusinessVisits::className(), ['id' => 'business_visits_id']);
    }
}
