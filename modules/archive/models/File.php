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
            [['file'], 'file', 
                'extensions'=>'zip, jpg, jpeg, png, pdf, doc, docx, xls, xlsx, ppt, pps, pptx', 
                'maxSize' => 1024 * 1024 * 10, 
                'skipOnEmpty' => true
                ],
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
            'user_id' => 'Responsável',
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

    public function getType()
    {
    switch ($this->filetype) {
        case 'jpg':
        case 'jpeg':
        case 'png':
            $type = '<i class="fa fa-file-image-o" aria-hidden="true"></i>';
            break;
        case 'zip':
            $type = '<i class="fa fa-file-zip-o" aria-hidden="true"></i>';
            break;
        case 'pdf':
            $type = '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>';
            break;
        case 'doc':
        case 'docx':
            $type = '<i class="fa fa-file-word-o" aria-hidden="true"></i>';
            break;
        case 'xls':
        case 'xlsx':
            $type = '<i class="fa fa-file-excel-o" aria-hidden="true"></i>';
            break;
        case 'ppt':
        case 'pptx':
        case 'pps':
            $type = '<i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>';
            break;
        default:
            $type = '<i class="fa fa-file-o" aria-hidden="true"></i>';
            break;
    }

    return $type;
}
}
