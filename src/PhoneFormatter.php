<?php

/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 09.03.2017
 * Time: 9:48
 */

namespace floor12\phone;

use yii\helpers\Html;

class PhoneFormatter
{

    public static function run($phone)
    {
        if (preg_match('/^(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})$/', $phone, $matches)) {
            $result = Html::a("+" . $matches[1] . ' (' . $matches[2] . ') ' . $matches[3] . "-" . $matches[4] . '-' . $matches[5], "tel:+$phone");
            return $result;
        }

        if (preg_match('/^(\d{2})(\d{3})(\d{3})(\d{2})(\d{2})$/', $phone, $matches)) {
            $result = Html::a("+" . $matches[1] . ' (' . $matches[2] . ') ' . $matches[3] . "-" . $matches[4] . '-' . $matches[5], "tel:+$phone");
            return $result;
        }
        return $phone;
    }
}