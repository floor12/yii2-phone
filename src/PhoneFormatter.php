<?php


namespace floor12\phone;

use yii\helpers\Html;

class PhoneFormatter
{

    /**
     * @param $phone
     * @return string
     */
    public static function run($phone)
    {
        return self::a($phone);
    }

    /**
     * @param $phone
     * @param array $options
     * @return string
     */
    public static function a($phone, array $options = [], $countCodeLength = 1)
    {
        return Html::a(self::format($phone, $countCodeLength), "tel:+{$phone}", $options);
    }

    /**
     * @param $phone
     * @return string
     */
    public static function format($phone, $countCodeLength = 1)
    {

        if (preg_match('/^(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})$/', $phone, $matches) && $countCodeLength == 1)
            return "+" . $matches[1] . ' (' . $matches[2] . ') ' . $matches[3] . "-" . $matches[4] . '-' . $matches[5];

        if (preg_match('/^(\d{2})(\d{3})(\d{3})(\d{2})(\d{2})$/', $phone, $matches) && $countCodeLength == 1)
            return "+" . $matches[1] . ' (' . $matches[2] . ') ' . $matches[3] . "-" . $matches[4] . '-' . $matches[5];

        if ($countCodeLength == 2)
            if (preg_match('/^(\d{2})(\d{3})(\d{2})(\d{2})(\d{2})$/', $phone, $matches))
                return "+" . $matches[1] . ' (' . $matches[2] . ') ' . $matches[3] . "-" . $matches[4] . '-' . $matches[5];

        return $phone;
    }
}