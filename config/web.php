<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'negocios',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    //'defaultRoute' => 'site/index',
    'language' => 'pt-BR',
    'sourceLanguage' => 'en-US',    
    'components' => [   
        'request' => [
            'cookieValidationKey' => 'pZimOwEEKa95a8BMJx-r8GftAYE0iqf_',
        ],
        // 'urlManager' => [
        //     'class' => 'yii\web\UrlManager',
        //     'showScriptName' => false,
        //     'enablePrettyUrl' => true,
        //     'rules' => array(
        //             '<controller:\w+>/<id:\d+>' => '<controller>/view',
        //             '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        //             '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        //     ),
        // ],        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['user/login'],
            'enableAutoLogin' => true,
        ],        
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'hostname',
                'username' => 'username@providername.com.br',
                'password' => 'superpassword',
                'port' => '587',
                'encryption' => 'tls',
                'streamOptions' => [
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                        ],
                    ],
            ],
        ],  
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
        ],    
        'redactor'          => 'yii\redactor\RedactorModule',
        'campaign'          => 'app\modules\campaign\Module',
        'resourcerequest'   => 'app\modules\resourcerequest\Module',
        'productivity'      => 'app\modules\productivity\Module',
        'visits'            => 'app\modules\visits\Module',
        'ideas'             => 'app\modules\ideas\Module',
        'task'              => 'app\modules\task\Module',
        'archive'           => 'app\modules\archive\Module',
    ],    
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
