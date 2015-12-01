<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    //'defaultRoute' => 'dailyproductivity/create',
    'language' => 'pt-BR',
    'sourceLanguage' => 'en-US',    
    'components' => [
        'request' => [
            'cookieValidationKey' => 'pZimOwEEKa95a8BMJx-r8GftAYE0iqf_',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'amnah\yii2\user\components\User',
            'identityClass' => 'app\models\User',
        ],
        'view' => [
                'theme' => [
                    'pathMap' => [
                        '@vendor/amnah/yii2-user/views/default' => '@app/views/user',
                    ],
                ],
            ],          
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
            'messageConfig' => [
                'from' => ['admin@website.com' => 'Admin'],
                'charset' => 'UTF-8',
            ]
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
        'user' => [
            'class' => 'amnah\yii2\user\Module',
            'controllerMap' => [
                'default' => 'app\controllers\UserController',
                'auth' => 'app\controllers\AuthController'
            ],
            'modelClasses'  => [
                'Profile' => 'app\models\Profile',
            ],
            // set custom module properties here ...
        ],
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
