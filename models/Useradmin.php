<?php

namespace app\models;

use Yii;

use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;

class Useradmin extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public $image;
    public $crop_info;    

    public function rules()
    {
        return [
            [['username', 'fullname', 'updated_at', 'created_at', 'email', 'birthdate', 'location_id', 'department_id', 'status'], 'required'],
            [['updated_at', 'created_at', 'status', 'location_id', 'department_id', 'can_admin', 'can_visits', 'can_productivity', 'can_requestresources', 'can_managervisits', 'can_managerproductivity', 'can_managerrequestresources'], 'integer'],
            [['birthdate'], 'safe'],
            [['username', 'email', 'fullname'], 'string', 'max' => 255],
            [['avatar', 'phone', 'celphone'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['email'], 'email'],
            [
                'image', 
                'file', 
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'],
            ],
            ['crop_info', 'safe'],            
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        // open image
        $image = Image::getImagine()->open($this->image->tempName);

        // rendering information about crop of ONE option 
        $cropInfo = Json::decode($this->crop_info)[0];
        //$cropInfo['dw'] = (int)$cropInfo['dw']; //new width image
        //$cropInfo['dh'] = (int)$cropInfo['dh']; //new height image
        //$cropInfo['x'] = abs($cropInfo['x']); //begin position of frame crop by X
        //$cropInfo['y'] = abs($cropInfo['y']); //begin position of frame crop by Y
        // Properties bolow we don't use in this example
        //$cropInfo['ratio'] = $cropInfo['ratio'] == 0 ? 1.0 : (float)$cropInfo['ratio']; //ratio image. 
        //$cropInfo['w'] = (int)$cropInfo['w']; //width of cropped image
        //$cropInfo['h'] = (int)$cropInfo['h']; //height of cropped image
        $cropInfo['dw'] = 250; //new width image
        $cropInfo['dh'] = 300; //new height image
        $cropInfo['x'] = 2; //begin position of frame crop by X
        $cropInfo['y'] = 3; //begin position of frame crop by Y        

        //delete old images
        // $oldImages = FileHelper::findFiles(Yii::$app->params['imgUrl'], [
        //     'only' => [
        //         $this->id . '.*',
        //         'thumb_' . $id . '.*',
        //     ], 
        // ]);
        // for ($i = 0; $i != count($oldImages); $i++) {
        //     @unlink($oldImages[$i]);
        // }

        //saving thumbnail
        $newSizeThumb = new Box($cropInfo['dw'], $cropInfo['dh']);
        $cropSizeThumb = new Box(200, 350); //frame size of crop
        $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
        $pathThumbImage = Yii::$app->params['usersAvatars'] . 'thumb/' . str_pad($this->id, 6, "0", STR_PAD_LEFT) . '.' . $this->image->getExtension();  

        $image->resize($newSizeThumb)
            ->crop($cropPointThumb, $cropSizeThumb)
            ->save($pathThumbImage, ['quality' => 90]);

        //saving original
        $this->image->saveAs(Yii::$app->params['usersAvatars'] . str_pad($this->id, 6, "0", STR_PAD_LEFT) . '.' . $this->image->getExtension());

        
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
            'image' => 'Imagem',
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

    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }      

    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }         
}
