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

    public function beforeSave($insert)
    {
        //CALCULO DAS PROPOSTAS

        $diff = strtotime(date('Y-m-d')) - strtotime($this->expirationdate);
        $days = intval($diff / 60 / 60 / 24);
        $formula1 = $this->referencevalue*(pow((1+0.018),($days/30)));
        $formula2 = $this->referencevalue*(pow((1+0.01),($days/30)));
        $formula3 = ($formula1 + $formula2) * 0.02;
        $proposal = $formula1+$formula2+$formula3;
        // PROPOSTA A
        $proposal_A = floatval($proposal);
        // PROPOSTA B
        $proposal_B = floatval($formula1);
        // PROPOSTA C
        $proposal_C = floatval(round(($this->referencevalue*(pow((1+0.014),($days/30)))), 2));
        // PROPOSTA D
        $proposal_D = floatval(round(($this->referencevalue*(pow((1+0.007),($days/30)))), 2));
        // PROPOSTA E
        $proposal_E = floatval(round(($this->referencevalue*1.66675), 2));
        // PROPOSTA F
        $proposal_F = floatval(round(($this->referencevalue), 2));


        // Calcula e define a proposta

        if($this->value_traded <= $proposal_A && $this->value_traded >= $proposal_B){
            $this->typeproposed = 0;
            $this->status = 1;
        }
        if($this->value_traded <= $proposal_B && $this->value_traded >= $proposal_C){
            $this->typeproposed = 1;
            $this->status = 1;
        }
        if($this->value_traded <= $proposal_C && $this->value_traded >= $proposal_D){
            $this->typeproposed = 2;
            $this->status = 1;
        }
        if($this->value_traded <= $proposal_D && $this->value_traded >= $proposal_E){
            $this->typeproposed = 3;
            $this->status = 0;
        }
        if($this->value_traded <= $proposal_E && $this->value_traded >= $proposal_F){
            $this->typeproposed = 4;
            $this->status = 0;
        }
        return parent::beforeSave($insert);
    }

    // typeofdebt
    public static $Static_typeofdebt = [
        'Acima de 180 dias',    // index 0 regra = 0%
        'Ajuizado',             // index 1 regra = 20%
        'Perdas',               // index 2 regra = 10%
        'Prejuizo',             // index 3 regra = 10%
        ];   
    public function getTypeofdebt()
    {
        if ($this->typeofdebt === null) {
            return null;
        }
        return self::$Static_typeofdebt[$this->typeofdebt];
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
            [['referencevalue', 'value_traded', 'value_input'], 'number'],
            [['expirationdate', 'date', 'approvedin'], 'safe'],
            [['clientname', 'contracts'], 'string', 'max' => 200],
            [['clientdoc'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'expirationdate' => 'Data de Vencimento',
            'typeofdebt' => 'Tipo de Dívida',
            'clientname' => 'Associado',
            'clientdoc' => 'CPF/CNPJ',
            'referencevalue' => 'Valor Referência',
            'negotiator_id' => 'Negociador',
            'location_id' => 'PA',
            'contracts' => 'Contratos',
            'value_traded' => 'Valor Negociado',
            'value_input' => 'Valor Entrada',
            'typeproposed' => 'Proposta Selecionada',
            'commission' => 'Comissão',
            'status' => 'Situação',
            'date' => 'Data da Operação.',
            'approvedby' => 'Aprovado Por',
            'approvedin' => 'Aprovado Em',
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

    public function getDays()
    {
        $diff = strtotime(date('Y-m-d')) - strtotime($this->expirationdate);
        $days = $diff / 60 / 60 / 24;
        return intval($days);
    }

    public function getSimulation1()
    {
    //$proposal = $formula1 + $formula2 + $formula3
    //$formula1 = ValorReferencia*(1+0.018)^(dias/30)
    //$formula2 = ValorReferencia*(1+0.01)^(dias/30)
    //$formula3 = ValorReferencia*(1+0.018)^(dias/30) + ValorReferencia*(1+0.01)^(dias/30) * 2%

        $diff = strtotime(date('Y-m-d')) - strtotime($this->expirationdate);
        $days = intval($diff / 60 / 60 / 24);

        $formula1 = $this->referencevalue*(pow((1+0.018),($days/30)));
        $formula2 = $this->referencevalue*(pow((1+0.01),($days/30)));
        $formula3 = ($formula1 + $formula2) * 0.02;
        $proposal = $formula1+$formula2+$formula3;

        switch ($this->typeofdebt) {
            case 0:
                $proposal = $proposal;
                break;
            case 1:
                $proposal = $proposal + ($proposal*0.2);
                break;
            case 2:
                $proposal = $proposal + ($proposal*0.1);
                break;
            case 3:
                $proposal = $proposal + ($proposal*0.1);
                break;
        }

        return "R$ " . round($proposal, 2);

    }

    public function getSimulation2()
    {
        $diff = strtotime(date('Y-m-d')) - strtotime($this->expirationdate);
        $days = intval($diff / 60 / 60 / 24);

        $proposal = $this->referencevalue*(pow((1+0.018),($days/30)));

        switch ($this->typeofdebt) {
            case 0:
                $proposal = $proposal;
                break;
            case 1:
                $proposal = $proposal + ($proposal*0.2);
                break;
            case 2:
                $proposal = $proposal + ($proposal*0.1);
                break;
            case 3:
                $proposal = $proposal + ($proposal*0.1);
                break;
        }

        return "R$ " . round($proposal, 2);
    }

    public function getSimulation3()
    {
        $diff = strtotime(date('Y-m-d')) - strtotime($this->expirationdate);
        $days = intval($diff / 60 / 60 / 24);

        $proposal = $this->referencevalue*(pow((1+0.014),($days/30)));

        switch ($this->typeofdebt) {
            case 0:
                $proposal = $proposal;
                break;
            case 1:
                $proposal = $proposal + ($proposal*0.2);
                break;
            case 2:
                $proposal = $proposal + ($proposal*0.1);
                break;
            case 3:
                $proposal = $proposal + ($proposal*0.1);
                break;
        }

        return "R$ " . round($proposal, 2);
    } 
}