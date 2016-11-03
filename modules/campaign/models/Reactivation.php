<?php

namespace app\modules\campaign\models;
use app\models\User;
use app\models\Location;
use Yii;

class Reactivation extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'campaign_reactivation';
    }

    public function rules()
    {
        return [
            [['location_id', 'user_id'], 'required'],
            [['agent_visit_number'], 'number'],
            [['agent_registration_renewal', 'agent_overdraft_value', 'agent_card_value', 'supervisor_package_rate',
            'manager_inactive_meeting','manager_approval','manager_final_opinion'], 'safe'],
            [['location_id', 'user_id'], 'integer'],

        ];
    }

    public function attributeLabels()
    {
        return [
        'id' => 'ID',
        'location_id' => 'Local',
        'client_name' => 'Nome',
        'client_risk' => 'Risco',
        'client_doc' => 'CPF/CNPJ',
        'client_inactive_since' => 'Inativo Desde',
        'client_last_renovated_register' => 'Ultima Renovação Cadastral',
        'client_income' => 'Renda',
        'restrictions_serasa' => 'Restrição Serasa',
        'restrictions_ccf' => 'Restrição CCF',
        'restrictions_scr' => 'Restrição SCR',
        'user_id' => 'Gerente',
        'agent_visit_number' => 'Número Relatório de Visita',
        'agent_registration_renewal' => 'Feita a renovação do cadastro em',
        'agent_overdraft_value' => 'Implantado cheque especial de',
        'agent_card_value' => 'Implantado Cartão de Crédito de R$',
        'supervisor_package_rate' => 'Implantado o Pacote Tarifário de Reativação',
        'manager_inactive_meeting' => 'Participou da Reunião Mensal com Inativos',
        'manager_approval' => 'Aprovação do Trabalho junto ao associado',
        'manager_final_opinion' => 'Parecer Final',
        ];
    }

    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }      
}
