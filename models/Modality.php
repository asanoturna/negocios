<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modality".
 *
 * @property integer $1
 * @property string $name
 * @property string $desc
 * @property integer $is_active
 */
class Modality extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'modality';
    }

    public function rules()
    {
        return [
            [['name', 'desc'], 'required'],
            [['is_active'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['desc'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            '1' => '1',
            'name' => 'Modalidade',
            'desc' => 'Descrição',
            'is_active' => 'Ativo',
        ];
    }
}
