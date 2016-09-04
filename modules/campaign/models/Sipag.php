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
            'anticipation' => 'Antecipação Efetivada',
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
}