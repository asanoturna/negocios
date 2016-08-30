<?php

namespace app\models;

use Yii;

class Archivecategory extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'archivecategory';
    }

    public function rules()
    {
        return [
            [['parent_id', 'status'], 'integer'],
            [['name', 'status'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    public function getArchives()
    {
        return $this->hasMany(Archive::className(), ['archivecategory_id' => 'id']);
    }
}