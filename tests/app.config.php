<?php
$config = [
    'id' => 'basic',
    'name' => 'You',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'components' => [
        'request' => [
            'enableCsrfValidation' => false,
            'enableCookieValidation' => false,
            'cookieValidationKey' => 'testRandomString',
        ],
        'cache' => ['class' => 'yii\caching\DummyCache'],
    ],

];


return $config;