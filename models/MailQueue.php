<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email_queue".
 *
 * @property string $id
 * @property string $from_name
 * @property string $from_email
 * @property string $to_email
 * @property string $subject
 * @property string $message
 * @property integer $max_attempts
 * @property integer $attempts
 * @property integer $success
 * @property string $date_published
 * @property string $last_attempt
 * @property string $date_sent
 */
class MailQueue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email_queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_email', 'to_email', 'subject', 'message'], 'required'],
            [['message'], 'string'],
            [['max_attempts', 'attempts', 'success'], 'integer'],
            [['date_published', 'last_attempt', 'date_sent'], 'safe'],
            [['from_name'], 'string', 'max' => 64],
            [['from_email', 'to_email'], 'string', 'max' => 128],
            [['subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_name' => 'From Name',
            'from_email' => 'From Email',
            'to_email' => 'To Email',
            'subject' => 'Subject',
            'message' => 'Message',
            'max_attempts' => 'Max Attempts',
            'attempts' => 'Attempts',
            'success' => 'Success',
            'date_published' => 'Date Published',
            'last_attempt' => 'Last Attempt',
            'date_sent' => 'Date Sent',
        ];
    }
}
