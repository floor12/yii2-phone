<?php
$config = [
    'id' => 'basic',
    'name' => 'You',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'components' => [
        'request' => [
            'enableCsrfValidation' => !YII_ENV_TEST,
            'enableCookieValidation' => !YII_ENV_TEST,
            'cookieValidationKey' => '1j7hf73hdl9kH9',
        ],
        'cache' => ['class' => 'yii\caching\DummyCache'],
        'authManager' => [
            'class' => '\yii\rbac\DbManager',
        ],
    ],

];


return $config;