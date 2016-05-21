<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resource_request".
 *
 * @property integer $id
 * @property string $created
 * @property string $client_name
 * @property string $client_phone
 * @property string $value_request
 * @property string $expiration_register
 * @property string $lastupdate_register
 * @property string $value_capital
 * @property string $observation
 * @property integer $has_transfer
 * @property integer $receive_credit
 * @property integer $add_insurance
 * @property string $requested _month
 * @property string $requested _year
 * @property integer $location_id
 * @property integer $user_id
 * @property integer $resource_type_id
 * @property integer $resource_purpose_id
 * @property integer $resource_status_id
 *
 * @property ResourceStatus $resourceStatus
 * @property Location $location
 * @property ResourcePurposes $resourcePurpose
 * @property ResourceType $resourceType
 */
class Resourcerequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resource_request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created', 'client_name', 'client_phone', 'value_request', 'expiration_register', 'lastupdate_register', 'value_capital', 'has_transfer', 'receive_credit', 'add_insurance', 'requested_month', 'requested_year', 'location_id', 'user_id', 'resource_type_id', 'resource_purpose_id', 'resource_status_id'], 'required'],
            [['created', 'expiration_register', 'lastupdate_register'], 'safe'],
            [['value_request', 'value_capital'], 'number'],
            [['observation'], 'string'],
            [['has_transfer', 'receive_credit', 'add_insurance', 'location_id', 'user_id', 'resource_type_id', 'resource_purpose_id', 'resource_status_id'], 'integer'],
            [['client_name'], 'string', 'max' => 200],
            [['client_phone'], 'string', 'max' => 50],
            [['requested _month'], 'string', 'max' => 15],
            [['requested _year'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
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
            'requested_month' => 'Mes de aplicação do Recurso',
            'requested_year' => 'Ano de aplicação do Recurso',
            'location_id' => 'Location ID',
            'user_id' => 'User ID',
            'resource_type_id' => 'Resource Type ID',
            'resource_purpose_id' => 'Resource Purpose ID',
            'resource_status_id' => 'Resource Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceStatus()
    {
        return $this->hasOne(ResourceStatus::className(), ['id' => 'resource_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourcePurpose()
    {
        return $this->hasOne(ResourcePurposes::className(), ['id' => 'resource_purpose_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceType()
    {
        return $this->hasOne(ResourceType::className(), ['id' => 'resource_type_id']);
    }
}
