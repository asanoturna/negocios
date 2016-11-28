<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "mod_task_list".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $department_id
 * @property integer $category_id
 * @property integer $status_id
 * @property string $deadline
 * @property integer $priority
 * @property integer $owner_id
 * @property integer $responsible_id
 * @property integer $is_done
 * @property string $created
 * @property string $updated
 *
 * @property ModTaskStatus $status
 * @property ModTaskCategory $category
 */
class Todolist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mod_task_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'status_id', 'deadline', 'priority', 'owner_id', 'responsible_id', 'created', 'updated'], 'required'],
            [['description'], 'string'],
            [['department_id', 'category_id', 'status_id', 'priority', 'owner_id', 'responsible_id', 'is_done'], 'integer'],
            [['deadline', 'created', 'updated'], 'safe'],
            [['name'], 'string', 'max' => 200],
            // [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ModTaskStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            // [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ModTaskCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'description' => 'Description',
            'department_id' => 'Department ID',
            'category_id' => 'Category ID',
            'status_id' => 'Status ID',
            'deadline' => 'Deadline',
            'priority' => 'Priority',
            'owner_id' => 'Owner ID',
            'responsible_id' => 'Responsible ID',
            'is_done' => 'Is Done',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ModTaskStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ModTaskCategory::className(), ['id' => 'category_id']);
    }
}
