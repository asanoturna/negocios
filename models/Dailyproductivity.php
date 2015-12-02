<?php

namespace app\models;

use Yii;


class Dailyproductivity extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'daily_productivity';
    }

    public function rules()
    {
        return [
            [['person_id', 'location_id', 'product_id', 'modality_id', 'valor', 'commission_percent', 'companys_revenue', 'daily_productivity_status_id', 'buyer_document', 'buyer_name', 'seller_id', 'operator_id', 'user_id','date', 'created', 'updated'], 'required', 'message' => 'Campo Obrigatório'],
            [['person_id', 'location_id', 'product_id', 'modality_id', 'daily_productivity_status_id', 'seller_id', 'operator_id', 'user_id'], 'integer', 'message' => 'Preencha corretamente'],
            [['valor', 'commission_percent', 'companys_revenue'], 'number'],
            [['date', 'created', 'updated'], 'safe'],
            [['buyer_name'], 'string', 'max' => 100],
            [['buyer_document'], 'string', 'max' => 18]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location_id' => 'PA',
            'product_id' => 'Produto',
            'modality_id' => 'Modalidade',
            'person_id' => 'Pessoa',
            //'manager' => 'Administradora',
            'valor' => 'Valor',
            'commission_percent' => 'Comissão (%)',
            'companys_revenue' => 'Receita da Cooperativa',
            'daily_productivity_status_id' => 'Situação',
            'buyer_document' => 'CPF/CNPJ Cliente',
            'buyer_name' => 'Nome Cliente',
            'seller_id' => 'Indicador',
            'operator_id' => 'Angariador',
            'user_id' => 'Usuário',
            'date' => 'Data',
            'created' => 'Criado',
            'updated' => 'Alterado',
        ];
    }

    public function getDailyProductivityStatus()
    {
        return $this->hasOne(Dailyproductivitystatus::className(), ['id' => 'daily_productivity_status_id']);
    }

    public function getModality()
    {
        return $this->hasOne(Modality::className(), ['id' => 'modality_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }    

    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    public function getSeller()
    {
        return $this->hasOne(User::className(), ['id' => 'seller_id']);
    }

    public function getOperator()
    {
        return $this->hasOne(User::className(), ['id' => 'operator_id']);
    }     

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }        

}
