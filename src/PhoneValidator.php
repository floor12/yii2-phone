<?php


namespace floor12\phone;

use Yii;
use yii\base\Model;
use yii\validators\Validator;
use yii\web\View;

class PhoneValidator extends Validator
{

    protected $formatError;
    protected $lengthError;

    public function init()
    {
        self::registerTranslations();
        $this->formatError = Yii::t('app.floor12.phone', 'The phone number must contain only numbers.');
        $this->lengthError = Yii::t('app.floor12.phone', 'The phone number must be 11 to 15 digits long.');
        Yii::$app->getView()->registerJs(sprintf('f12_phone_error_format = "%s";', $this->formatError), View::POS_END);
        Yii::$app->getView()->registerJs(sprintf('f12_phone_error_length = "%s";', $this->lengthError), View::POS_END);
        parent::init();
    }

    public static function registerTranslations()
    {
        $i18n = Yii::$app->i18n;
        $i18n->translations['app.floor12.phone'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@vendor/floor12/yii2-phone/src/messages',
            'sourceLanguage' => 'en-US',
            'fileMap' => [
                'app.floor12.phone' => 'phone.php',
            ],
        ];
    }

    /**
     * @param Model $model
     * @param string $attribute
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
        if (is_array($value) || is_object($value)) {
            return [Yii::t('yii', '{attribute} is invalid.'), []];
        }

        if (!is_numeric($value)) {
            return [$this->formatError, []];
        }

        if ((strlen(strval($value)) > 15) || (strlen(strval($value)) < 11)) {
            return [$this->lengthError, []];
        }
    }

    /**
     * @param mixed $value
     * @param null $error
     * @return bool
     */
    public function validate($value, &$error = null)
    {
        if (!is_null($value) && !is_string($value) && !is_numeric($value)) {
            return false;
        }
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
        return 'f12phone.validatePhone(value, messages, ' . json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . ');';
    }

}
