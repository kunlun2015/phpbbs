<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
                'debugphp.html' => 'about/debugphp',
                'contact.html' => 'about/contact',
                'feedback.html' => 'about/feedback',
                'exemption.html' => 'about/exemption',
                'sitemap.html' => 'about/sitemap',
                'experience.html' => 'about/experience',
                '<fmap:\w+>/<id:\d+>.html' => 'detail',
                'tag/<id>' => 'tag'
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'app/error',
        ]
    ],
    'params' => $params,
];
