<?php

namespace app\models;

use Yii;

class Resourcetype extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'resource_type';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getResourceRequests()
    {
        return $this->hasMany(ResourceRequest::className(), ['resource_type_id' => 'id']);
    }
}
