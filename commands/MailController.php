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

    protected function findModel($id)
    {
        if (($model = MailQueue::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
