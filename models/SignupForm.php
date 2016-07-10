<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Usuário já existe!'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Endereço de e-mail já existe!'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuário',
            'auth_key' => 'Chave de Autenticação',
            'password' => 'Senha',
            'password_hash' => 'Senha',
            'password_reset_token' => 'Password Reset Token',
            'updated_at' => 'Alterado em',
            'created_at' => 'Criado em',
            'status' => 'Situação',
            'email' => 'Email',
            'avatar' => 'Imagem',
            'fullname' => 'Nome Completo',
            'phone' => 'Telefone / Ramal',
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

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}