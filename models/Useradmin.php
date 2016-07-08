<?php

namespace app\models;

use Yii;

class Useradmin extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['username', 'fullname', 'auth_key', 'password_hash', 'updated_at', 'created_at', 'email', 'birthdate', 'location_id', 'department_id', 'status'], 'required'],
            [['updated_at', 'created_at', 'status', 'location_id', 'department_id', 'can_admin', 'can_visits', 'can_productivity', 'can_requestresources', 'can_managervisits', 'can_managerproductivity', 'can_managerrequestresources'], 'integer'],
            [['birthdate'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'fullname'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['avatar', 'phone', 'celphone'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuário',
            'auth_key' => 'Chave de Autenticação',
            'password_hash' => 'Senha',
            'password_reset_token' => 'Password Reset Token',
            'updated_at' => 'Alterado em',
            'created_at' => 'Criado em',
            'status' => 'Situação',
            'email' => 'Email',
            'avatar' => 'Imagem',
            'fullname' => 'Nome Completo',
            'phone' => 'Telefone',
            'celphone' => 'Celular',
            'birthdate' => 'Data de Nascimento',
            'location_id' => 'Unidade',
            'department_id' => 'Departamento',
            'can_admin' => 'Administração do Sistema',
            'can_visits' => 'Visitas',
            'can_productivity' => 'Produtividade',
            'can_requestresources' => 'Recursos',
            'can_managervisits' => 'Gerenciar Visitas',
            'can_managerproductivity' => 'Gerenciar Produtividade',
            'can_managerrequestresources' => 'Gerenciar Recursos',
        ];
    }

    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }      

    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }         
}
