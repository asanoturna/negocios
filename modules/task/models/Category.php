<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "mod_task_category".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ModTaskList[] $modTaskLists
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mod_task_category';
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
        return $this->hasMany(ModTaskList::className(), ['category_id' => 'id']);
    }
}
