<?php

namespace app\modules\client;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\client\controllers';

    public function init()
    {
        parent::init();

        \Yii::configure($this, require(__DIR__ . '/config/main.php'));
    }
}