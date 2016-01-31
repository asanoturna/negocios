<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business_visits".
 *
 * @property integer $id
 * @property string $date
 * @property string $responsible
 * @property string $company_person
 * @property string $contact
 * @property string $email
 * @property string $phone
 * @property string $value
 * @property integer $num_proposal
 * @property string $observation
 * @property string $created
 * @property string $updated
 * @property string $ip
 * @property string $attachment
 * @property string $localization_map
 * @property integer $visits_finality_id
 * @property integer $visits_status_id
 * @property integer $person_id
 * @property integer $location_id
 * @property integer $user_id
 *
 * @property Location $location
 * @property Person $person
 * @property VisitsStatus $visitsStatus
 * @property VisitsFinality $visitsFinality
 * @property VisitsImages[] $visitsImages
 */
class Visits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_visits';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'responsible', 'company_person', 'visits_finality_id', 'visits_status_id', 'person_id', 'location_id', 'user_id'], 'required'],
            [['date', 'created', 'updated'], 'safe'],
            [['value'], 'number'],
            [['num_proposal', 'visits_finality_id', 'visits_status_id', 'person_id', 'location_id', 'user_id'], 'integer'],
            [['observation'], 'string'],
            [['responsible', 'company_person', 'contact', 'email', 'phone'], 'string', 'max' => 45],
            [['ip'], 'string', 'max' => 20],
            [['attachment', 'localization_map'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'responsible' => 'Responsible',
            'company_person' => 'Company Person',
            'contact' => 'Contact',
            'email' => 'Email',
            'phone' => 'Phone',
            'value' => 'Value',
            'num_proposal' => 'Num Proposal',
            'observation' => 'Observation',
            'created' => 'Created',
            'updated' => 'Updated',
            'ip' => 'Ip',
            'attachment' => 'Attachment',
            'localization_map' => 'Localization Map',
            'visits_finality_id' => 'Visits Finality ID',
            'visits_status_id' => 'Visits Status ID',
            'person_id' => 'Person ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitsStatus()
    {
        return $this->hasOne(VisitsStatus::className(), ['id' => 'visits_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitsFinality()
    {
        return $this->hasOne(VisitsFinality::className(), ['id' => 'visits_finality_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitsImages()
    {
        return $this->hasMany(VisitsImages::className(), ['business_visits_id' => 'id']);
    }
}
