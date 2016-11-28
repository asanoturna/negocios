<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "mod_task_status".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ModTaskList[] $modTaskLists
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mod_task_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
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
    public function getModTaskLists()
    {
        return $this->hasMany(ModTaskList::className(), ['status_id' => 'id']);
    }
}
