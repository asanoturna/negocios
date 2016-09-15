<?php

namespace app\modules\campaign\models;
use app\models\User;
use app\models\Location;

use Yii;

class Recovery extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'campaign_recovery';
    }

    // typeproposed
    public static $Static_typeproposed = [
        'A', 
        'B', 
        'C', 
        'D',
        'E', 
        'F',        
        ];   
    public function getTypeproposed()
    {
        if ($this->typeproposed === null) {
            return null;
        }
        return self::$Static_typeproposed[$this->typeproposed];
    }         

    // status
    public static $Static_status = [
        'PENDENTE', 
        'APROVADO', 
        ];   
    public function getStatus()
    {
        if ($this->status === null) {
            return null;
        }
        return self::$Static_status[$this->status];
    }         

    public function rules()
    {
        return [
            [['negotiator_id', 'location_id', 'clientname', 'clientdoc', 'status'], 'required'],
            [['negotiator_id', 'location_id', 'typeproposed', 'status', 'approvedby'], 'integer'],
            [['value_traded', 'value_input', 'commission'], 'number'],
            [['date', 'approvedin'], 'safe'],
            [['clientname', 'contracts'], 'string', 'max' => 200],
            [['clientdoc'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'negotiator_id' => 'Negociador',
            'location_id' => 'Agência',
            'clientname' => 'Associado',
            'clientdoc' => 'CPF/CNPJ',
            'contracts' => 'Contratos',
            'value_traded' => 'Valor Negociado',
            'value_input' => 'Valor Entrada',
            'typeproposed' => 'Proposta',
            'commission' => 'Commissão',
            'status' => 'Situação',
            'date' => 'Date Op.',
            'approvedby' => 'Validado Por',
            'approvedin' => 'Validado Em',
        ];
    }

    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }    

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'negotiator_id']);
    }

    public function getCheckedby()
    {
        return $this->hasOne(User::className(), ['id' => 'approvedby']);
    }     
}