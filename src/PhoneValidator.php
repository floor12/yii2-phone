<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 19.01.2017
 * Time: 18:18
 */

namespace floor12\phone;

class PhoneValidator extends \yii\validators\Validator
{

    public function validateAttribute($model, $attribute)
    {
        $model->$attribute = str_replace([' ', '-', '_', '(', ')', '+'], '', trim($model->$attribute));
        $result = $this->validateValue($model->$attribute);
        if (!empty($result)) {
            $this->addError($model, $attribute, $result[0], $result[1]);
        }
    }

    public function validate($value, &$error = null)
    {
        $value = str_replace([' ', '-', '(', ')', '_', '+'], '', trim($value));
        $result = $this->validateValue($value);
        if (empty($result)) {
            return true;
        }
    }


    protected function validateValue($value)
    {

        if (is_array($value) || is_object($value)) {
            return [Yii::t('yii', '{attribute} is invalid.'), []];
        }

        if (!is_numeric($value))
            return ["Телефонный номер должен содержать только цифры.", []];

        if ((strlen(strval($value)) > 12) || (strlen(strval($value)) < 11))
            return ["Телефонный номер должны быть длиною 11 или 12 цифр.", []];

    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
        PhoneValidatorAsset::register($view);
        $options = $this->getClientOptions($model, $attribute);
        return 'validatePhone(value, messages, ' . json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . ');';

    }

}