<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 19.01.2017
 * Time: 18:18
 *
 */

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
