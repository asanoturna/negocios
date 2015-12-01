<?php

namespace app\models;

use Yii;

class Product extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['name', 'desc'], 'required'],
            [['is_active'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['desc'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Produto',
            'desc' => 'Descrição',
            'is_active' => 'Ativo',
        ];
    }
}
