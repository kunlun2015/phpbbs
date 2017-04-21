<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CN',
    'timeZone'=>'Asia/Chongqing',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=yii',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
            'tablePrefix' => 'kl_'
        ],
        'cache' => [
            'class' => 'yii\caching\MemCache',
            'servers' => [
                [
                    'host' => '127.0.0.1',
                    'port' => 11211
                ]
            ]
        ],
        'i18n' => [ 
            'translations' => [ 
                'app' => [ 
                    'class' => 'yii\i18n\PhpMessageSource', 
                    'basePath' => '@common/messages', 
                    // 'sourceLanguage' => 'en-US', 
                    'fileMap' => [
                        'app' => 'app.php', 
                        'app/error' => 'error.php', 
                    ],
                ],
            ],
        ]
    ]
];
