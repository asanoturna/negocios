<?php

namespace app\modules\campaign\models;
use app\models\User;
use Yii;

class Sipag extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'campaign_sipag';
    }

    public $tax;
    public $file;

    // establishmenttype
    public static $Static_establishmenttype = [
        'RESTAURANTE',
        'ALIMENTAÇÃO EMERCADOS ESPECIAIS',
        'SUPERMERCADO',
        'AUTOPOSTO',
        'ACADEMIA',
        'ESCOLAS',
        'HOTEIS',
        'LOJAS',
        ];   
    public function getEstablishmenttype()
    {
        if ($this->establishmenttype === null) {
            return null;
        }
        return self::$Static_establishmenttype[$this->establishmenttype];
    }  

    // visited
    public static $Static_visited = [
        'SIM', 
        'NÃO', 
        ];   
    public function getVisited()
    {
        if ($this->status === null) {
            return null;
        }
        return self::$Static_visited[$this->visited];
    }

    // accredited
    public static $Static_accredited = [
        'SIM',
        'NÃO',
        'SIPAG', 
        'CIELO', 
        'REDE',
        'OUTROS',
        'NÃO',
        ];   
    public function getAccredited()
    {
        if ($this->status === null) {
            return null;
        }
        return self::$Static_accredited[$this->accredited];
    } 

    // locked
    public static $Static_locked = [
        'SIM', 
        'NÃO', 
        ];   
    public function getLocked()
    {
        if ($this->status === null) {
            return null;
        }
        return self::$Static_locked[$this->locked];
    } 

    //anticipation
    public static $Static_anticipation = [
        'SIM', 
        'NÃO', 
        ];   
    public function getAnticipation()
    {
        if ($this->status === null) {
            return null;
        }
        return self::$Static_anticipation[$this->anticipation];
    } 

    // status
    public static $Static_status = [
        'SIM', 
        'NÃO', 
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
            [['establishmenttype', 'establishmentname','visited', 'accredited', 'status', 'locked', 'anticipation', 'status'], 'required'],
            [['establishmenttype', 'visited', 'accredited', 'status', 'locked', 'anticipation', 'status', 'user_id', 'checkedby_id'], 'integer'],
            [['date', 'created', 'updated'], 'safe'],
            [['observation'], 'string'],
            [['establishmentname', 'address', 'expedient'], 'string'],
            [['establishmentname', 'address', 'expedient'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created' => 'Criado em',
            'updated' => 'Alterado em',            
            'establishmenttype' => 'Tipo do Estabelecimento',
            'establishmentname' => 'Estabelecimento',
            'address' => 'Endereço',
            'expedient' => 'Expediente',
            'visited' => 'Visitado',
            'accredited' => 'Credenciado',
            'locked' => 'Travado',                        
            'anticipation' => 'Antecipação Efet.',
            'status' => 'Ativo',                        
            'user_id' => 'Gerente',
            'checkedby_id'=> 'Aprovado por',
            'date' => 'Aprovado em',
            'observation' => 'Observação',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getCheckedby()
    {
        return $this->hasOne(User::className(), ['id' => 'checkedby_id']);
    }       
}