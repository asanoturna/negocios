<?php

namespace app\models;

use Yii;

class Links extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'links';
    }

    public function rules()
    {
        return [
            [['name', 'url', 'created', 'updated', 'status'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['description'], 'string'],
            [['created', 'updated'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome',
            'user_id' => 'Usuário',
            'description' => 'Descrição',
            'url' => 'Endereço',
            'created' => 'Criação',
            'updated' => 'Alteração',
            'status' => 'Situação',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }    
}