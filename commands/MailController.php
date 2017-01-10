<?php

namespace app\commands;

use yii\console\Controller;

use Yii;
use app\models\MailQueue;

class MailController extends Controller
{

    public function actionTask()
    {
        $v1 = 50;
        $v2 = 456;
        $value = $v1 + $v2;
     echo $value;

    }

    public function actionSend()
    {
    $mails=MailQueue::find()->all();
    foreach($mails as $mail)
    {
         if($mail->success==1)
         {
         if($mail->attempts<=$mail->max_attempts)
            {
                //send mail here
            $message =\Yii::$app->mail->compose();
                $message->setHtmlBody($mail->message,'text/html')
                        ->setFrom($mail->from_email)
                        ->setTo($mail->to_email)
                        ->setSubject($mail->subject);


            if($message->send())
                {
                 $mail->success=0;//set status to 0 to avoid resending of emails.
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
        if (($model = MailQueue::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
