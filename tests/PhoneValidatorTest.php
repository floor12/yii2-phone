<?php

namespace floor12\phone\tests;

use floor12\phone\PhoneValidator;
use PHPUnit\Framework\TestCase;

class PhoneValidatorTest extends TestCase
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
        $this->assertEquals("The phone number must be 11 to 15 digits long.", $model->errors['phone'][0]);

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
        $this->assertEquals("The phone number must be 11 to 15 digits long.", $model->errors['phone'][0]);

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
        $this->assertEquals("The phone number must contain only numbers.", $model->errors['phone'][0]);

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