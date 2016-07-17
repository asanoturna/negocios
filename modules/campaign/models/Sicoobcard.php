<?php

namespace app\modules\campaign\models;
use app\models\User;
use Yii;

class Sicoobcard extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'campaign_sicoobcard';
    }

    public static $Static_product_type = [
        'ATIVAÇÃO', 
        'REATIVAÇÃO', 
        ];   

    public function getProductType()
    {
        if ($this->product_type === null) {
            return null;
        }
        return self::$Static_product_type[$this->product_type];
    }             

    public function rules()
    {
        return [
            [['name', 'card', 'purchasedate', 'purchasevalue', 'purchaselocal', 'product_type','user_id'], 'required'],
            [['purchasedate', 'created', 'updated'], 'safe'],
            [['purchasevalue'], 'number'],
            [['product_type', 'user_id'], 'integer'],
            [['purchaselocal','name'], 'string', 'max' => 100],
            [['card'], 'string', 'max' => 13],
            [['card'], 'string', 'min' => 13, 'message' => 'Favor informar os 13 dígitos'],          
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome Titular',
            'card' => 'Conta Cartão',
            'purchasedate' => 'Data da Compra',
            'purchasevalue' => 'Valor da Compra',
            'purchaselocal' => 'Local da Compra',
            'product_type' => 'Produto',
            'created' => 'Incluído em',
            'updated' => 'Alterado em',
            'user_id' => 'Usuário',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }        
}