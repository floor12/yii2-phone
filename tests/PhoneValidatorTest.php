<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 07.01.2018
 * Time: 12:45
 */

namespace floor12\phone\tests;

use floor12\phone\PhoneValidator;
use PHPUnit_Framework_TestCase;

class PhoneValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * Wrong value type
     */
    public function testWrongType()
    {
        $validator = new PhoneValidator();
        $this->assertFalse($validator->validate([]));
    }

    /**
     * To short value
     */
    public function testTooShortPhone()
    {
        $model = new User();
        $model->phone = 123;
        $this->assertFalse($model->validate());
        $this->assertEquals("Телефонный номер должны быть длиною 11 или 12 цифр.", $model->errors['phone'][0]);

        $validator = new PhoneValidator();
        $this->assertFalse($validator->validate($model->phone));
    }

    /**
     * Too logn value
     */
    public function testTooLongPhone()
    {
        $model = new User();
        $model->phone = 121231312312313123;
        $this->assertFalse($model->validate());
        $this->assertEquals("Телефонный номер должны быть длиною 11 или 12 цифр.", $model->errors['phone'][0]);

        $validator = new PhoneValidator();
        $this->assertFalse($validator->validate($model->phone));
    }

    /**
     *  Value with letters
     */
    public function testPhoneWithLetters()
    {
        $model = new User();
        $model->phone = '7926849852dd';
        $this->assertFalse($model->validate());
        $this->assertEquals("Телефонный номер должен содержать только цифры.", $model->errors['phone'][0]);

        $validator = new PhoneValidator();
        $this->assertFalse($validator->validate($model->phone));
    }


    /**
     * Valid number with 11 digits
     */
    public function testValidPhone()
    {
        $model = new User();
        $model->phone = '79268465236';
        $this->assertTrue($model->validate());

        $validator = new PhoneValidator();
        $this->assertTrue($validator->validate($model->phone));
    }

    /**
     * Valid number with 11 digits
     */
    public function testValidPhone2()
    {
        $model = new User();
        $model->phone = '+7 (926) 846-52-36';
        $this->assertTrue($model->validate());

        $validator = new PhoneValidator();
        $this->assertTrue($validator->validate($model->phone));
    }

    /**
     * Valid number with 11 digits
     */
    public function testValidPhone3()
    {
        $model = new User();
        $model->phone = '7 926 846-52-36';
        $this->assertTrue($model->validate());

        $validator = new PhoneValidator();
        $this->assertTrue($validator->validate($model->phone));
    }

    /**
     * Valid number with 12 digits
     */
    public function testValidPhon4e()
    {
        $model = new User();
        $model->phone = '349268465236';
        $this->assertTrue($model->validate());

        $validator = new PhoneValidator();
        $this->assertTrue($validator->validate($model->phone));
    }

    /**
     * Valid number with 12 digits
     */
    public function testValidPhone5()
    {
        $model = new User();
        $model->phone = '+12 (926) 846-52-36';
        $this->assertTrue($model->validate());

        $validator = new PhoneValidator();
        $this->assertTrue($validator->validate($model->phone));
    }

    /**
     * Valid number with 12 digits
     */
    public function testValidPhone6()
    {
        $model = new User();
        $model->phone = '12 926 846-52-36';
        $this->assertTrue($model->validate());

        $validator = new PhoneValidator();
        $this->assertTrue($validator->validate($model->phone));
    }

}