<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resource_purposes".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ResourceRequest[] $resourceRequests
 */
class Resourcepurposes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resource_purposes';
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
        return $this->hasMany(ResourceRequest::className(), ['resource_purpose_id' => 'id']);
    }
}
