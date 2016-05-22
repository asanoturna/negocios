<?php

namespace app\models;

use Yii;

class Resourcerequest extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'resource_request';
    }   

    public static $Static_has_transfer   = ['Sim', 'Não'];

    public static $Static_receive_credit = ['Yes', 'Não']; 

    public static $Static_add_insurance  = ['Sim', 'Não'];

    public static $Static_requested_month  = ['Janeiro', 'Fevereiro', 'Março', 'Abril'];

    public static $Static_requested_year  = ['2016', '2017', '2018', '2019', '2020'];    

    public function rules()
    {
        return [
            [['created', 'client_name', 'client_phone', 'value_request', 'expiration_register', 'lastupdate_register', 'value_capital', 'requested_month', 'requested_year', 'location_id', 'user_id', 'resource_type_id', 'resource_purpose_id', 'resource_status_id','has_transfer', 'receive_credit', 'add_insurance'], 'required'],
            [['created', 'expiration_register', 'lastupdate_register'], 'safe'],
            [['value_request', 'value_capital'], 'number'],
            [['observation'], 'string'],
            [['location_id', 'user_id', 'resource_type_id', 'resource_purpose_id', 'resource_status_id'], 'integer'],
            [['client_name'], 'string', 'max' => 200],
            [['client_phone'], 'string', 'max' => 50],
            [['requested_month'], 'string', 'max' => 15],
            [['requested_year', 'has_transfer', 'receive_credit', 'add_insurance'], 'string', 'max' => 4]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created' => 'Inserido em',
            'client_name' => 'Nome do Cliente',
            'client_phone' => 'Telefone do Cliente',
            'value_request' => 'Valor Solicitado',
            'expiration_register' => 'Vencimento Cadastro',
            'lastupdate_register' => 'Ultima Atualização Cadastral',
            'value_capital' => 'Valor Capital',
            'observation' => 'Observação',
            'has_transfer' => 'Possui Repasse?',
            'receive_credit' => 'Recebe Credito?',
            'add_insurance' => 'Adesão Seguro Prestamista?',
            'requested_month' => 'Mes',
            'requested_year' => 'Ano',
            'location_id' => 'PA',
            'user_id' => 'Usuário',
            'resource_type_id' => 'Tipo do Recurso',
            'resource_purpose_id' => 'Finalidade',
            'resource_status_id' => 'Situação',
        ];
    }

    public function getResourceStatus()
    {
        return $this->hasOne(ResourceStatus::className(), ['id' => 'resource_status_id']);
    }

    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    public function getResourcePurpose()
    {
        return $this->hasOne(ResourcePurposes::className(), ['id' => 'resource_purpose_id']);
    }

    public function getResourceType()
    {
        return $this->hasOne(ResourceType::className(), ['id' => 'resource_type_id']);
    }
    
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }      
}
