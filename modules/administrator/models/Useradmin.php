<?php

namespace app\modules\administrator\models;

use Yii;

use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\web\UploadedFile;

class Useradmin extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public function beforeSave($insert)
    {
        if(isset($this->password)) 
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        return parent::beforeSave($insert);
    }

    public $file;
    public $filename;
    public $password;

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['username', 'fullname', 'status', 'phone', 'birthdate', 'location_id', 'department_id','role_id','password'];
        $scenarios['update'] = ['username', 'email', 'password'];
        return $scenarios;
    }

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            [['username', 'fullname', 'status', 'phone', 'birthdate', 'location_id', 'department_id','role_id'], 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Usuário já existe!', 'on' => 'create'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Endereço de e-mail já existe!', 'on' => 'create'],

            ['password', 'required', 'skipOnEmpty' => TRUE, 'on' => 'update'],
            ['password', 'string', 'min' => 6],

            [['file'], 'file', 'extensions'=>'jpg', 'maxSize' => 1024 * 1024 * 1],
            [['avatar'], 'string', 'max' => 200],
        ];
    }

    public function getImageFile()
    {
        return isset($this->avatar) ? Yii::$app->params['usersAvatars'] . $this->avatar : null;
    }
    public function getImageUrl()
    {
        $avatar = isset($this->avatar) ? $this->avatar : 'default-avatar.png';
        return Yii::$app->params['usersAvatars'] . $avatar;
    }
    public function uploadImage()
    {
        $file = UploadedFile::getInstance($this, 'file');
 
        if (empty($file)) {
            return false;
        }
 
        $this->filename = $file->name;
        $ext = @end((explode(".", $file->name)));
 
        $this->avatar = Yii::$app->security->generateRandomString().".{$ext}";
 
        return $file;
    }
    public function deleteImage()
    {
        $file = $this->getImageFile();
 
        if (empty($file) || !file_exists($file)) {
            return false;
        }
 
        if (!unlink($file)) {
            return false;
        }
 
        $this->avatar = null;
        $this->filename = null;
 
        return true;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Perfil de Acesso',
            'username' => 'Usuário',
            'auth_key' => 'Chave de Autenticação',
            'password_hash' => 'Senha',
            'password_reset_token' => 'Password Reset Token',
            'updated_at' => 'Alterado em',
            'created_at' => 'Criado em',
            'status' => 'Situação',
            'email' => 'Email',
            'avatar' => 'Imagem',
            'image' => 'Imagem',
            'fullname' => 'Nome Completo',
            'phone' => 'Telefone / Ramal',
            'celphone' => 'Celular',
            'birthdate' => 'Data de Nascimento',
            'location_id' => 'Unidade',
            'department_id' => 'Departamento',
            'file' => 'Imagem',
            'password' => 'Senha',
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

    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }  
}
