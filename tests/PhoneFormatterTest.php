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
     * Format 11 digits number
     */
    public function testPhone11DigitsLongCountry()
    {
        $phone = 34660393000;
        $result = PhoneFormatter::format($phone, 2);
        $this->assertEquals("+34 (660) 39-30-00", $result);
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
     * Create link with 11 digits number
     */
    public function testPhone11DigitsLinkLongCountry()
    {
        $phone = 34660393000;
        $result = PhoneFormatter::a($phone, [], 2);
        $this->assertEquals("<a href=\"tel:+{$phone}\">+34 (660) 39-30-00</a>", $result);
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