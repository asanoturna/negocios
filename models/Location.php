<?php

namespace app\models;

use Yii;

class Location extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'location';
    }

    public function rules()
    {
        return [
            [['shortname', 'fullname', 'is_active'], 'required'],
            [['is_active'], 'integer'],
            [['shortname'], 'string', 'max' => 50],
            [['fullname'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shortname' => 'PA',
            'fullname' => 'Agência',
            'is_active' => 'Situação',
        ];
    }
}
