<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "capital_action".
 *
 * @property integer $id
 * @property string $name
 * @property string $proposed
 * @property string $accomplished
 * @property string $date1
 * @property string $date2
 * @property string $progress
 * @property string $created
 * @property string $updated
 * @property string $ip
 * @property integer $location_id
 * @property integer $user_id
 *
 * @property Location $location
 */
class Capitalaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capital_action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'proposed', 'accomplished', 'location_id', 'user_id'], 'required'],
            [['proposed', 'accomplished'], 'number'],
            [['date1', 'date2', 'created', 'updated'], 'safe'],
            [['progress'], 'string'],
            [['location_id', 'user_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['ip'], 'string', 'max' => 20]
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
            'proposed' => 'Proposed',
            'accomplished' => 'Accomplished',
            'date1' => 'Date1',
            'date2' => 'Date2',
            'progress' => 'Progress',
            'created' => 'Created',
            'updated' => 'Updated',
            'ip' => 'Ip',
            'location_id' => 'Location ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }
}
