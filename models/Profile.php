<?php
namespace app\models;

use amnah\yii2\user\models\Profile as BaseProfile;
use Yii;

class Profile extends BaseProfile {

    public function rules()
    {
        return [
            // [['user_id'], 'required'],
            // [['user_id'], 'integer'],
            // [['create_time', 'update_time'], 'safe'],
            [['full_name', 'avatar'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'user_id'     => 'User',
            'create_time' => 'Criação',
            'update_time' => 'Alteração',
            'full_name'   => 'Nome Completo',
            'avatar'      => 'Imagem',
        ];
    }
}