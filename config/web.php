<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'caet',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                // ...
                ],
            ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'rJzLxDfzw3OwwFS165N1vvzgn2K7mDhH',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
       
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
            /*'transport' => [
              'class' => 'Swift_SmtpTransport',
              'host' => 'smtp.gmail.com',
              'username' => 'seshadri.baral@gmail.com',
              'password' => '',
              'port' => '465',
              'encryption' => 'tls',
          ],*/
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
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
             'modelMap' => [
                'Profile' => 'app\models\users\Profile',
                'User'=>'app\models\users\User',
            ],  
            'controllerMap' => [
                                'settings' => 'app\controllers\user\SettingsController',
                                'admin' => 'app\controllers\user\AdminController',
                                'role'=>'app\controllers\user\RoleController',
                                'security'=>'app\controllers\user\SecurityController',
                                ],
            'enableUnconfirmedLogin' => false,
            'enableConfirmation'=>true,
            'confirmWithin' => 86400,
            'cost' => 12,
            'admins' => ['admin'],                     
        ],
    ],
    'params' => $params,
];


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';

}

return $config;
