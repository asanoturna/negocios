<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resource_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ResourceRequest[] $resourceRequests
 */
class Resourcetype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resource_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceRequests()
    {
        return $this->hasMany(ResourceRequest::className(), ['resource_type_id' => 'id']);
    }
}
