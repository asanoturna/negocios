<?php

namespace app\models;

use Yii;

class Archive extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'archive';
    }

    public function rules()
    {
        return [
            [['archivecategory_id', 'name', 'attachment', 'created', 'updated', 'status', 'user_id'], 'required'],
            [['archivecategory_id', 'downloads', 'filesize', 'status', 'user_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name', 'attachment'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['filetype'], 'string', 'max' => 5],
            [['archivecategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Archivecategory::className(), 'targetAttribute' => ['archivecategory_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'archivecategory_id' => 'Archivecategory ID',
            'name' => 'Name',
            'attachment' => 'Attachment',
            'description' => 'Description',
            'downloads' => 'Downloads',
            'filesize' => 'Filesize',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
            'user_id' => 'User ID',
            'filetype' => 'Filetype',
        ];
    }

    public function getArchivecategory()
    {
        return $this->hasOne(Archivecategory::className(), ['id' => 'archivecategory_id']);
    }
}