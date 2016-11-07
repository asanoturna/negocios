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

    // restrictions_serasa
    public static $Static_serasa = [
        'NÃO',
        'SIM',
        ];   
    public function getSerasa()
    {
        if ($this->restrictions_serasa === null) {
            return null;
        }
        return self::$Static_serasa[$this->restrictions_serasa];
    }

    // restrictions_ccf
    public static $Static_ccf = [
        'NÃO',
        'SIM',
        ];   
    public function getCcf()
    {
        if ($this->restrictions_ccf === null) {
            return null;
        }
        return self::$Static_ccf[$this->restrictions_ccf];
    }

    // restrictions_scr
    public static $Static_scr = [
        'NÃO',
        'SIM',
        ];   
    public function getScr()
    {
        if ($this->restrictions_scr === null) {
            return null;
        }
        return self::$Static_scr[$this->restrictions_scr];
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
        'location_id' => 'PA',
        'client_name' => 'Nome',
        'client_risk' => 'Risco',
        'client_doc' => 'CPF/CNPJ',
        'client_last_renovated_register' => 'Ultima Renovação Cadastral',
        'client_income' => 'Renda',
        // gerentes
        'restrictions_serasa' => 'Restrição Serasa',
        'restrictions_ccf' => 'Restrição CCF',
        'restrictions_scr' => 'Restrição SCR',
        'agent_visit_number' => 'Número Relatório de Visita',
        'agent_registration_renewal' => 'Feita a renovação do cadastro em',
        'agent_overdraft_value' => 'Implantado cheque especial de',
        'agent_card_value' => 'Implantado Cartão de Crédito de R$',
        // fabricia
        'supervisor_package_rate' => 'Implantado o Pacote Tarifário de Reativação',
        // claudio
        'user_id' => 'Gerente',
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
