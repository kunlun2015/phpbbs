<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'fileSavePath' => dirname(dirname(__DIR__)).'/upload/',
    'uploadSaveDirs' => array('avatar', 'banner', 'posts'),
    'imgUrl' => 'http://local.img.debugphp.com/',
    'logRootPath' => dirname(dirname(__DIR__)).'/log/',
    'cateMap' => [
        1 => 'php',
        2 => 'db',
        3 => 'server',
        4 => 'frame',
        5 => 'web',
        6 => 'news'
    ]
];
