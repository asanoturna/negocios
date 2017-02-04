<?php

namespace app\modules\client\models;

use Yii;

class Base extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'mod_client_base';
    }

    public $value;
    public $quota;

    // category_id
    public static $Static_category = [
        'DIAMANTE',
        'ESMERALDA',
        'RUBI',
        'SAFIRA',
        'TOPÁZIO',
        ];   
    public function getCategory()
    {
        if ($this->category_id === null) {
            return null;
        }
        return self::$Static_category[$this->category_id];
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
            'name' => 'Nome',
            'account' => 'Conta',
            'doc' => 'CPF/CNPJ',
            'category_id' => 'Categoria',
        ];
    }


}
