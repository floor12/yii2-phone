# yii2-phone

Formatter and validator form phone numbers

*Этот файл доступен на [русском языке](README_RU.md).*

[![Build Status](https://scrutinizer-ci.com/g/floor12/yii2-phone/badges/build.png?b=master)](https://scrutinizer-ci.com/g/floor12/yii2-phone/build-status/master)
[![Code quality score](https://scrutinizer-ci.com/g/floor12/yii2-phone/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/floor12/yii2-phone/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/floor12/yii2-phone/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/floor12/yii2-phone/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/floor12/yii2-phone/v/stable)](https://packagist.org/packages/floor12/yii2-phone)
[![Total Downloads](https://poser.pugx.org/floor12/yii2-phone/downloads)](https://packagist.org/packages/floor12/yii2-phone)
[![License](https://poser.pugx.org/floor12/yii2-phone/license)](https://packagist.org/packages/floor12/yii2-phone)

## Installation

To use this extension run this command:

 ```bash
 $ composer require floor12/yii2-phone
 ```
or add this to the `require` section of your composer.json.
 ```json
 "floor12/yii2-phone": "dev-master"
 ```
 

## Usage
This extension allows to validate phone numbers and save only numbers in db without any formatting. 
It also include simple formatter to render formatted phone numbers as string or html `<a href='tel:'>` tag.

### Phone validation
To store phone number in database, ActiveRecord model database field should be VARCHAR(15).

The validator has backend and frontend (js) validation.
To validate your field, add `floor12\phone\PhoneValidator` to `ActiveRecord::rules()` action like this:

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


### Phone formatting

Class `floor12\phone\PhoneFormatter` allows to render phone number as formatted string or as html `<a href="tel:">`, and has two static
 methods: 
- `PhoneFormatter::format($phone)`
- `PhoneFormatter::a($phone,array $options= [])`

*Formatting examples*

```php
echo PhoneFormatter::format(79461234565);                       # +7 (946) 123-45-65
echo PhoneFormatter::a(79461234565);                            # <a href='tel:+79461234565'>+7 (946) 123-45-65</a>
echo PhoneFormatter::a(79461234565,['class'=>'phone-link']);    # <a href='tel:+79461234565' class='phone-link'>+7 (946) 123-45-65</a>
``` 




