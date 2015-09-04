<?php

$params = require(__DIR__ . '/params.php');

$config = [
        
    'id' => 'minimal',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
    'image' => [
                'class' => 'yii\image\ImageDriver',
                'driver' => 'GD',  //GD or Imagick
                
            ],
      
        'urlManager' => [
        'class' => 'yii\web\UrlManager',
        // Disable index.php
        'showScriptName' => false,
        // Disable r= routes
        'enablePrettyUrl' => true,
        
        ],
            'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dieinyourboots',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'formatter' => [
        'timeZone' => 'Europe/Moscow',
       'dateFormat' => 'php:d.m.Y',
       'datetimeFormat'=>'php:d-M-Y H:i:s'
       ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

return $config;
