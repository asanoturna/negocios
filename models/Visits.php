<?php

namespace app\models;

use Yii;


class Visits extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'business_visits';
    }

    public function rules()
    {
        return [
            [['date', 'responsible', 'company_person', 'visits_finality_id', 'visits_status_id', 'person_id', 'location_id', 'user_id'], 'required', 'message' => 'Campo Obrigatório'],
            [['date', 'created', 'updated'], 'safe'],
            [['value'], 'number'],
            [['num_proposal', 'visits_finality_id', 'visits_status_id', 'person_id', 'location_id', 'user_id'], 'integer'],
            [['observation'], 'string'],
            [['responsible', 'company_person', 'contact', 'email', 'phone'], 'string', 'max' => 45],
            [['ip'], 'string', 'max' => 20],
            [['attachment', 'localization_map'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Data',
            'responsible' => 'Responsável',
            'company_person' => 'Empresa / Pessoa',
            'contact' => 'Contato',
            'email' => 'E-mail',
            'phone' => 'Telefone',
            'value' => 'Valor',
            'num_proposal' => 'Nº Proposta',
            'observation' => 'Parecer',
            'created' => 'Criado em',
            'updated' => 'Alterado em',
            'ip' => 'IP',
            'attachment' => 'Anexo (FE211)',
            'localization_map' => 'Localização No Mapa',
            'visits_finality_id' => 'Finalidade ',
            'visits_status_id' => 'Status',
            'person_id' => 'Tipo',
            'location_id' => 'PA',
            'user_id' => 'Gerente',
        ];
    }

    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    public function getVisitsStatus()
    {
        return $this->hasOne(VisitsStatus::className(), ['id' => 'visits_status_id']);
    }

    public function getVisitsFinality()
    {
        return $this->hasOne(VisitsFinality::className(), ['id' => 'visits_finality_id']);
    }

    public function getVisitsImages()
    {
        return $this->hasMany(VisitsImages::className(), ['business_visits_id' => 'id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }    
}
