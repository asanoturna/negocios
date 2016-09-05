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

    // establishmenttype
    public static $Static_establishmenttype = [
        'RESTAURANTE',
        'LANCHONETE',
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
            [['establishmenttype', 'establishmentname'], 'required'],
            [['establishmenttype', 'visited ', 'accredited', 'status', 'locked', 'anticipation', 'status', 'user_id', 'checkedby'], 'integer'],
            [['date', 'created', 'updated'], 'safe'],
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
            'establishmenttype' => 'Tipo',
            'establishmentname' => 'Estabelecimento',
            'address' => 'Endereço',
            'expedient' => 'Expediente',
            'visited' => 'Visitado',
            'accredited' => 'Credenciado',
            'locked' => 'Travado',                        
            'anticipation' => 'Antecipação Efet.',
            'status' => 'Ativo',                        
            'user_id' => 'Gerente',
            'checkedby'=> 'Conferido',
            'date' => 'Data',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getCheckedby()
    {
        return $this->hasOne(User::className(), ['id' => 'checkedby']);
    }       
}