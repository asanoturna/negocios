<?php

namespace app\modules\client\models;

use Yii;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'mod_client_category';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Linha de Crédito',
            'rate_diamante' => 'Diamante',
            'rate_esmeralda' => 'Esmeralda',
            'rate_rubi' => 'Rubi',
            'rate_safira' => 'Safira',
            'rate_topazio' => 'Topazio',
        ];
    }

    public function getModTaskLists()
    {
        return $this->hasMany(ModTaskList::className(), ['category_id' => 'id']);
    }
}
