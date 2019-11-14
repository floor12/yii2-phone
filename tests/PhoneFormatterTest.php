<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 07.01.2018
 * Time: 12:45
 */

namespace floor12\phone\tests;


use floor12\phone\PhoneFormatter;
use PHPUnit_Framework_TestCase;

class PhoneFormatterTest extends PHPUnit_Framework_TestCase
{
    /**
     * If no valid number - just pass it though
     */
    public function testNoValidPhone()
    {
        $phone = 58465;
        $result = PhoneFormatter::format($phone);
        $this->assertEquals($phone, $result);
    }

    /**
     * Format 11 digits number
     */
    public function testPhone11Digits()
    {
        $phone = 79208498755;
        $result = PhoneFormatter::format($phone);
        $this->assertEquals("+7 (920) 849-87-55", $result);
    }

    /**
     * Create link with 11 digits number
     */
    public function testPhone11DigitsLink()
    {
        $phone = 79208498755;
        $result = PhoneFormatter::a($phone);
        $this->assertEquals("<a href=\"tel:+{$phone}\">+7 (920) 849-87-55</a>", $result);
    }

    /**
     * Format 12 digits number
     */
    public function testPhone12Digits()
    {
        $phone = 219208498755;
        $result = PhoneFormatter::format($phone);
        $this->assertEquals("+21 (920) 849-87-55", $result);
    }

    /**
     * Create link with 11 digits number
     */
    public function testPhone12DigitsLink()
    {
        $phone = 219208498755;
        $result = PhoneFormatter::a($phone);
        $this->assertEquals("<a href=\"tel:+{$phone}\">+21 (920) 849-87-55</a>", $result);
    }


}