<?php

namespace app\models;
use yii\web\UploadedFile;

use Yii;

class Reportbase extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'report_base';
    }

    public $file;
    public $filename;

    public function rules()
    {
        return [
            //[['file', 'updated'], 'required'],
            [['updated'], 'safe'],
            [['downloads'], 'integer'],
            [['file'], 'file', 'extensions'=>'zip', 'maxSize' => 1024 * 1024 * 5],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attachment' => 'Arquivo',
            'file' => 'Planilha',
            'updated' => 'Alterado',
            'downloads' => 'Downloads',
        ];
    }

    public function getImageFile()
    {
        return isset($this->attachment) ? Yii::$app->params['reportbasePath'].'/'. $this->attachment : null;
    }
    public function getImageUrl()
    {
        $attachment = isset($this->attachment) ? $this->attachment : 'no-reportbase.png';
        return Yii::$app->params['reportbasePath'] . $attachment;
    }
    public function uploadImage() {
        $file = UploadedFile::getInstance($this, 'file');
 
        if (empty($file)) {
            return false;
        }

        $this->filename = $file->name;
        $ext = end((explode(".", $file->name)));

        $this->attachment = Yii::$app->security->generateRandomString().".{$ext}";


        return $file;
    }    
}
