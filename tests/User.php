<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 29.07.2018
 * Time: 9:46
 */

namespace floor12\phone\tests;


use floor12\phone\PhoneValidator;
use yii\base\Model;

class User extends Model
{

    public $phone;

    public function rules()
    {
        return [
            ['phone', PhoneValidator::class]
        ];
    }
}