<?php

use yii\console\Application;

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

new Application([
    'id' => 'test',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
]);