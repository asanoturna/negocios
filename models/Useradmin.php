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
            [['username', 'auth_key', 'password_hash', 'updated_at', 'created_at', 'email', 'birthdate', 'location_id', 'department_id'], 'required'],
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
            'fullname' => 'Nome',
            'phone' => 'Telefone',
            'celphone' => 'Celular',
            'birthdate' => 'Data de Nscimento',
            'location_id' => 'Unidade',
            'department_id' => 'Departamento',
            'can_admin' => 'Can Admin',
            'can_visits' => 'Can Visits',
            'can_productivity' => 'Can Productivity',
            'can_requestresources' => 'Can Requestresources',
            'can_managervisits' => 'Can Managervisits',
            'can_managerproductivity' => 'Can Managerproductivity',
            'can_managerrequestresources' => 'Can Managerrequestresources',
        ];
    }
}
