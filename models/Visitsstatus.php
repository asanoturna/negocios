<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visits_status".
 *
 * @property integer $id
 * @property string $name
 * @property string $hexcolor
 * @property string $about
 *
 * @property BusinessVisits[] $businessVisits
 */
class Visitsstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visits_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'hexcolor', 'about'], 'required'],
            [['name', 'hexcolor'], 'string', 'max' => 45],
            [['about'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Situação',
            'hexcolor' => 'Cor',
            'about' => 'Sobre a Situação',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessVisits()
    {
        return $this->hasMany(BusinessVisits::className(), ['visits_status_id' => 'id']);
    }
}
