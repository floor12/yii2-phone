<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 07.01.2018
 * Time: 12:45
 */

namespace floor12\phone\tests;


class PhoneValidatorTest extends \PHPUnit_Framework_TestCase
{
    /** Проверяем слишком короткий номер
     */
    public function testTooShortPhone()
    {
        $model = new User();
        $model->phone = 123;
        $this->assertFalse($model->validate());
        $this->assertEquals("Телефонный номер должны быть длиною 11 или 12 цифр.", $model->errors['phone'][0]);
    }


    /** Проверяем слишком длинный номер
     */
    public function testTooLongPhone()
    {
        $model = new User();
        $model->phone = 121231312312313123;
        $this->assertFalse($model->validate());
        $this->assertEquals("Телефонный номер должны быть длиною 11 или 12 цифр.", $model->errors['phone'][0]);
    }

    /** Проверяем номер с буквами
     */
    public function testPhoneWithLetters()
    {
        $model = new User();
        $model->phone = '7926849852dd';
        $this->assertFalse($model->validate());
        $this->assertEquals("Телефонный номер должен содержать только цифры.", $model->errors['phone'][0]);
    }


    /** Проверяем валидный телефон 11 цифр
     */
    public function testValidPhone()
    {
        $model = new User();
        $model->phone = '79268465236';
        $this->assertTrue($model->validate());
    }

    /** Проверяем валидный телефон 11 цифр
     */
    public function testValidPhone2()
    {
        $model = new User();
        $model->phone = '+7 (926) 846-52-36';
        $this->assertTrue($model->validate());
    }

    /** Проверяем валидный телефон 11 цифр
     */
    public function testValidPhone3()
    {
        $model = new User();
        $model->phone = '7 926 846-52-36';
        $this->assertTrue($model->validate());
    }

    /** Проверяем валидный телефон 12 цифр
     */
    public function testValidPhon4e()
    {
        $model = new User();
        $model->phone = '349268465236';
        $this->assertTrue($model->validate());
    }

    /** Проверяем валидный телефон 12 цифр
     */
    public function testValidPhone5()
    {
        $model = new User();
        $model->phone = '+12 (926) 846-52-36';
        $this->assertTrue($model->validate());
    }

    /** Проверяем валидный телефон 12 цифр
     */
    public function testValidPhone6()
    {
        $model = new User();
        $model->phone = '12 926 846-52-36';
        $this->assertTrue($model->validate());
    }

}