<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resource_status".
 *
 * @property integer $id
 * @property string $name
 * @property string $hexcolor
 *
 * @property ResourceRequest[] $resourceRequests
 */
class Resourcestatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resource_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'hexcolor'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['hexcolor'], 'string', 'max' => 10]
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
            'hexcolor' => 'Hexcolor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceRequests()
    {
        return $this->hasMany(ResourceRequest::className(), ['resource_status_id' => 'id']);
    }
}
