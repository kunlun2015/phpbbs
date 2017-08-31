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
            'dsn' => 'mysql:dbname=yii;host=127.0.0.1',
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
        ],
        'mailer' => [
            //配置邮箱'service@debugphp.com'
            'transport'=>[
                'class'=>'Swift_SmtpTransport',
                'host'=>'smtp.exmail.qq.com',
                'username'=>'service@debugphp.com',
                'password'=>'2XpG6YBj7WDQyhEu',
                'port'=> 465,
                'encryption'=>'ssl',
            ],
        ],
    ]
];
