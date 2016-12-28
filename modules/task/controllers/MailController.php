<?php

namespace app\modules\task\controllers;

use Yii;
use app\modules\task\models\Todolist;
use app\modules\task\models\TodolistSearch;
use app\models\User;
use app\models\Department;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\ErrorException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Security;
use yii\web\UploadedFile;

class TodolistController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'only'  => ['index','create','view','calendar','performance','responsible'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    // https://mytechystuffs.wordpress.com/2014/09/16/send-emails-as-queue-from-your-yii2-application/
    public function actionSend()
    {

    $mails=MailQueue::find()->all();

    foreach($mails as $mail)

    {
         if($mail->success==1)
         {
         if($mail->attempts<=$mail->max_attempts)
            {

            $message =\Yii::$app->mail->compose();
                $message->setHtmlBody($mail->message,'text/html')
                        ->setFrom($mail->from_email)
                        ->setTo($mail->to_email)
                        ->setSubject($mail->subject);


            if($message->send())
                {
                 $mail->success=0;
                 $mail->date_sent=date("Y-m-d H:i:s");
                }
             $mail->attempts=$mail->attempts + 1;
             $mail->last_attempt= date("Y-m-d H:i:s");
             $mail->save();
            }
          }
      }

    }

    protected function findModel($id)
    {
        if (($model = Todolist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
