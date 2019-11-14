# yii2-phone

Валидатор и форматтор для телефонных номеров.

[![Build Status](https://travis-ci.org/floor12/yii2-phone.svg?branch=master)](https://travis-ci.org/floor12/yii2-phone)
[![Latest Stable Version](https://poser.pugx.org/floor12/yii2-phone/v/stable)](https://packagist.org/packages/floor12/yii2-phone)
[![Latest Unstable Version](https://poser.pugx.org/floor12/yii2-phone/v/unstable)](https://packagist.org/packages/floor12/yii2-phone)
[![Total Downloads](https://poser.pugx.org/floor12/yii2-phone/downloads)](https://packagist.org/packages/floor12/yii2-phone)
[![License](https://poser.pugx.org/floor12/yii2-phone/license)](https://packagist.org/packages/floor12/yii2-phone)

## Установка

Выполняем команду
```bash
$ composer require floor12/yii2-phone
```
или добавляем в секцию "required" файла composer.json
```json
"floor12/yii2-phone": "dev-master"
```

## Использование
Пакет позволяет валидировать телефонные номера и очищать их от лишних символов, а так же форматировать номера и генерировать ссылки.

### Валидация

Для хранения телефонных номеров в модели ActiveRecord тип поля должен быть позволять размещать строки не менее 12 символов.

Валидатор поддерживает валидацию и на бекенде и на клиентской стороне.

Для добавления валидатора в вашу модель, достаточно указать класс `floor12\phone\PhoneValidator` среди валидаторов в методе `rules()`.
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


### Форматирование

Класс `floor12\phone\PhoneFormatter
` позволяет отформотировать телефонный номер двумя методами: простое форматирование или генерация ссылки с href="tel:+xxxxxxxxxxx
". Для этого класс обладает двумя статическими методами 
- `PhoneFormatter::format($phone)`
- `PhoneFormatter::a($phone,array $options= [])`

*Примеры использования*

```php
echo PhoneFormatter::format(79461234565);                       # +7 (946) 123-45-65
echo PhoneFormatter::a(79461234565);                            # <a href='tel:+79461234565'>+7 (946) 123-45-65</a>
echo PhoneFormatter::a(79461234565,['class'=>'phone-link']);    # <a href='tel:+79461234565' class='phone-link'>+7 (946) 123-45-65</a>
``` 




