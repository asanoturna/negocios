<?php

namespace app\commands;

use yii\console\Controller;

use Yii;
use app\models\MailQueue;

class MailController extends Controller
{

    public function actionTask()
    {

        \Yii::$app->mailer->compose('@app/mail/task');
        ->setFrom('intranet@sicoobcrediriodoce.com.br')
        ->setTo('gustavo.andrade@sicoobcrediriodoce.com.br')
        ->setCc('suporte@sicoobcrediriodoce.com.br')
        ->setSubject('999')
        //->setTextBody('Nova Ocorrencia registrada')
        //->setHtmlBody('<b>Nova Ocorrencia registrada</b>')
        ->send();

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
