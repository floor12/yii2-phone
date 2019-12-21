<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 19.01.2017
 * Time: 18:18
 */

namespace floor12\phone;

use Yii;
use yii\base\Model;
use yii\base\NotSupportedException;
use yii\validators\Validator;
use yii\web\View;

class PhoneValidator extends Validator
{

    /**
     * @param Model $model
     * @param string $attribute
     * @throws NotSupportedException
     */
    public function validateAttribute($model, $attribute)
    {
        $model->$attribute = $this->clear($model->$attribute);
        $result = $this->validateValue($model->$attribute);
        if (!empty($result)) {
            $this->addError($model, $attribute, $result[0], $result[1]);
        }
    }

    /**
     * @param $value
     * @return mixed
     */
    protected function clear($value)
    {
        return str_replace([' ', '-', '(', ')', '_', '+'], '', trim($value));
    }

    /**
     * @return array
     */
    protected function validateValue($value)
    {
        if (is_array($value) || is_object($value))
            return [Yii::t('yii', '{attribute} is invalid.'), []];

        if (!is_numeric($value))
            return ["Телефонный номер должен содержать только цифры.", []];

        if ((strlen(strval($value)) > 12) || (strlen(strval($value)) < 11))
            return ["Телефонный номер должны быть длиною 11 или 12 цифр.", []];
    }

    /**
     * @param mixed $value
     * @param null $error
     * @return bool
     */
    public function validate($value, &$error = null)
    {
        if (!is_null($value) && !is_string($value) && !is_numeric($value))
            return false;
        $value = $this->clear($value);
        $result = $this->validateValue($value);
        if (!empty($result)) {
            $error = $result[0];
            return false;
        }
        return true;
    }

    /**
     * @param Model $model
     * @param string $attribute
     * @param View $view
     * @return string|null
     */
    public function clientValidateAttribute($model, $attribute, $view)
    {
        PhoneValidatorAsset::register($view);
        $options = $this->getClientOptions($model, $attribute);
        return 'validatePhone(value, messages, ' . json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . ');';
    }

}