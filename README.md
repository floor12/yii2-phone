# yii2-phone

Валидатор и форматтор для телефонных номеров.

[![Build Status](https://travis-ci.org/floor12/yii2-phone.svg?branch=master)](https://travis-ci.org/floor12/yii2-phone)
[![Latest Stable Version](https://poser.pugx.org/floor12/yii2-phone/v/stable)](https://packagist.org/packages/floor12/yii2-phone)
[![Latest Unstable Version](https://poser.pugx.org/floor12/yii2-phone/v/unstable)](https://packagist.org/packages/floor12/yii2-phone)
[![Total Downloads](https://poser.pugx.org/floor12/yii2-phone/downloads)](https://packagist.org/packages/floor12/yii2-phone)
[![License](https://poser.pugx.org/floor12/yii2-phone/license)](https://packagist.org/packages/floor12/yii2-phone)

Установка
------------

Выполняем команду
```bash
$ composer require floor12/yii2-phone
```

иди добавляем в секцию "requred" файла composer.json
```json
"floor12/yii2-phone": "dev-master"
```

Использование валидатора
------------

Для хранения телефонных номеров в модели ActiveRecord тип поля должен быть int(12), 
во время валидации поле приводится к численному значению.  


Валидатор работает и на клиентской и на серверной стороне.
Для добавления валидатора в вашу модель, достаточно указать класс `floor12\phone\PhoneValidator` среди валидаторов вашей модели.
Вот примитивный пример:

```php
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
``` 


Форматирование телефонных номеров
------------

Для представления численного значения номера в виде tel-ссылки используется класс `floor12\phone\PhoneFormatter`

```php
echo PhoneFormatter::run(79461234565);
``` 

Этот код выведет  `<a href='tel:+79461234565'>+7 (946) 123-45-65</a>`



