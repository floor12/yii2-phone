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

    /**
     * @param $phone
     * @return string
     */
    public static function format($phone)
    {
        if (preg_match('/^(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})$/', $phone, $matches))
            return "+" . $matches[1] . ' (' . $matches[2] . ') ' . $matches[3] . "-" . $matches[4] . '-' . $matches[5];

        if (preg_match('/^(\d{2})(\d{3})(\d{3})(\d{2})(\d{2})$/', $phone, $matches))
            return "+" . $matches[1] . ' (' . $matches[2] . ') ' . $matches[3] . "-" . $matches[4] . '-' . $matches[5];

        return $phone;
    }

    /**
     * @param $phone
     * @param array $options
     * @return string
     */
    public static function a($phone, array $options = [])
    {
        return Html::a(self::format($phone), "tel:+{$phone}", $options);
    }
}