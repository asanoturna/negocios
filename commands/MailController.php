<?php

namespace app\commands;

use yii\console\Controller;

use Yii;
use app\models\MailQueue;

/*
 * usage:
 * 
 * yii mail/send
 * or
 * php yii mail/send
 * 

by controller:
     \Yii::$app->mailer->compose('@app/mail/task')
    ->setFrom('intranet@sicoobcrediriodoce.com.br')
    ->setTo($model->responsible->email)
    ->setCc($model->coresponsible->email)
    ->setSubject(Yii::$app->params['appname'].' - '.\Yii::$app->getModule('task')->params['taskModuleName']. ' - Nova Tarefa : #'. $model->id)
    //->setTextBody('Nova Ocorrencia registrada')
    //->setHtmlBody('<b>Nova Ocorrencia registrada</b>')
    ->send();
*/

class MailController extends Controller
{
    public function actionNew()
    {
    $mails=MailQueue::find()->where('success=1')->all();
    foreach($mails as $mail)
        {
        $message =\Yii::$app->mailer->compose('@app/mail/task');
            $message->setFrom($mail->from_email)
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

    public function actionReminder()
    {
    $mails=MailQueue::find()->where('success=1')->all();
    foreach($mails as $mail)
        {
        $message =\Yii::$app->mailer->compose('@app/mail/task');
            $message->setFrom($mail->from_email)
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

    // public function actionSend()
    // {
    // $mails=MailQueue::find()->all();
    // foreach($mails as $mail)
    //     {
    //     if($mail->success==1)
    //     {
    //     if($mail->attempts<=$mail->max_attempts)
    //         {
    //         $message =\Yii::$app->mail->compose();
    //             $message->setHtmlBody($mail->message,'text/html')
    //                     ->setFrom($mail->from_email)
    //                     ->setTo($mail->to_email)
    //                     ->setSubject($mail->subject);
    //         if($message->send())
    //             {
    //              $mail->success=0;.
    //              $mail->date_sent=date("Y-m-d H:i:s");
    //             }
    //          $mail->attempts=$mail->attempts + 1;
    //          $mail->last_attempt= date("Y-m-d H:i:s");
    //          $mail->save();
    //         }
    //     }
    //     }
    // }

    protected function findModel($id)
    {
        if (($model = MailQueue::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Página solicitada não pode ser encontrada!');
        }
    }
}
