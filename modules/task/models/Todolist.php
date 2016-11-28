<?php

namespace app\modules\task\models;

use Yii;

class Todolist extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'mod_task_list';
    }

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

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome',
            'description' => 'Descrição',
            'department_id' => 'Departamento',
            'category_id' => 'Categoria',
            'status_id' => 'Situação',
            'deadline' => 'Prazo',
            'priority' => 'Prioridade',
            'owner_id' => 'Criado por',
            'responsible_id' => 'Responsável',
            'is_done' => 'Feito?',
            'created' => 'Criado em',
            'updated' => 'Alterado em',
        ];
    }

    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
