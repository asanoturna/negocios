<?php

namespace app\modules\task\models;
use app\models\Department;

use Yii;

class Todolist extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'mod_task_list';
    }

    public $file;
    public $filename;

    // priority
    public static $Static_priority = [
        'Normal',
        'Importante',
        'Urgente',
        'Crítico',
        ];
    public function getPriority()
    {
        if ($this->priority === null) {
            return null;
        }
        return self::$Static_priority[$this->priority];
    } 

    public function rules()
    {
        return [
            [['name', 'category_id', 'status_id', 'deadline', 'priority', 'owner_id', 'responsible_id', 'created', 'updated'], 'required'],
            [['description','responsible_note'], 'string'],
            [['department_id', 'category_id', 'status_id', 'priority', 'owner_id', 'responsible_id', 'is_done','flag_remember_task','flag_report_responsible'], 'integer'],
            [['deadline', 'created', 'updated'], 'safe'],
            [['name','attachment'], 'string', 'max' => 200],
            // [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ModTaskStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            // [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ModTaskCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome da Atividade',
            'description' => 'Descrição da Atividade',
            'department_id' => 'Departamento',
            'category_id' => 'Categoria',
            'status_id' => 'Situação',
            'deadline' => 'Prazo para Atividade',
            'priority' => 'Prioridade',
            'owner_id' => 'Criado por',
            'responsible_id' => 'Responsável pela Atividade',
            'is_done' => 'Feito?',
            'created' => 'Criado em',
            'updated' => 'Alterado em',
            'flag_remember_task' => 'Lembrar Responsável por e-mail',
            'flag_report_responsible' => 'Informar Responsável por e-mail',
            'responsible_note' => 'Observação Responsável',
            'attachment' => 'Anexo',
            'file' => 'Anexo',
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

    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
}
