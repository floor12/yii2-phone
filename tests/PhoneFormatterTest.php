<?php

namespace floor12\phone\tests;


use floor12\phone\PhoneFormatter;
use PHPUnit\Framework\TestCase;


class PhoneFormatterTest extends TestCase
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