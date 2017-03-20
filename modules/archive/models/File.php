<?php

namespace app\modules\archive\models;
use yii\web\UploadedFile;
use app\models\User;

use Yii;

class File extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'mod_archive_file';
    }

    public function rules()
    {
        return [
            [['archive_category_id', 'name', 'user_id'], 'required'],
            [['archive_category_id', 'is_active', 'user_id'], 'integer'],
            [['description'], 'string', 'max' => 200],
            [['attachment', 'file', 'filename', 'filesize', 'filetype', 'downloads', 'created', 'updated'], 'safe'],
            [['file'], 'file', 'extensions'=>'jpg, png, pdf, doc, docx, xls, xlsx', 'maxSize' => 1024 * 1024 * 4, 'skipOnEmpty' => true],
            [['name','attachment'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'archive_category_id' => 'Categoria',
            'name' => 'Nome do Arquivo',
            'attachment' => 'Anexo',
            'description' => 'Descrição',
            'downloads' => 'Downloads',
            'filesize' => 'Tamanho',
            'created' => 'Publicação',
            'updated' => 'Alteração',
            'is_active' => 'Ativo',
            'user_id' => 'Usuário',
            'filetype' => 'Formato',
            'file' => 'Arquivo',
        ];
    }

    public $file;
    public $filename;

    public function getImageFile()
    {
        return isset($this->attachment) ? \Yii::$app->getModule('archive')->params['archiveAttachment'] . $this->attachment : null;
    }
    public function getImageUrl()
    {
        $attachment = isset($this->attachment) ? $this->attachment : 'default-attachment.png';
        return \Yii::$app->getModule('archive')->params['archiveAttachment'] . $attachment;
    }
    public function uploadImage()
    {
        $file = UploadedFile::getInstance($this, 'file');
 
        if (empty($file)) {
            return false;
        }
 
        $this->filename = $file->name;
        $ext = @end((explode(".", $file->name)));
 
        $this->attachment = Yii::$app->security->generateRandomString().".{$ext}";
        $this->filetype = $ext;
        $this->filesize = $file->size;// testar

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
 
        $this->attachment = null;
        $this->filename = null;
 
        return true;
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'archive_category_id']);
    }

    public function getResponsible()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
