<?php

namespace floor12\phone;

use yii\web\AssetBundle;

class PhoneValidatorAsset extends AssetBundle
{
    public $sourcePath = '@vendor/floor12/yii2-phone/src/assets/';

    public $js = [
        'validator.phone.js',
    ];
    public $depends = [
        'yii\validators\ValidationAsset'
    ];
}
