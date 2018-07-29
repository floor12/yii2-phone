<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 07.01.2018
 * Time: 12:45
 */

namespace floor12\phone\tests;


use floor12\phone\PhoneFormatter;

class PhoneFormatterTest extends \PHPUnit_Framework_TestCase
{
    /** Проверяем форматирование невалидного номера, форматирование не пирменяется.
     */
    public function testNoValidPhone()
    {
        $phone = 58465;
        $result = PhoneFormatter::run($phone);
        $this->assertEquals($phone, $result);
    }

    /** Проверяем форматирование 11-значного номера номера
     */
    public function testPhone11Digits()
    {
        $phone = 79208498755;
        $result = PhoneFormatter::run($phone);
        $this->assertEquals("<a href=\"tel:+{$phone}\">+7 (920) 849-87-55</a>", $result);
    }

    /** Проверяем форматирование 12-значного номера номера
     */
    public function testPhone12Digits()
    {
        $phone = 219208498755;
        $result = PhoneFormatter::run($phone);
        $this->assertEquals("<a href=\"tel:+{$phone}\">+21 (920) 849-87-55</a>", $result);
    }


}