<?php

use PHPUnit\Framework\TestCase;

class PhoneNumberTest extends TestCase
{
    public function testFrancePhoneNumber()
    {
        $validFrancePhoneNumber = "0033633445566";
        $regExpPattern = "/^((\+|00)?\(?(33)\)?[-.\s]?([0-9]{3})[-.\s]?([0-9]{6})|([0-9]{2}\s?){4}[0-9]{2})$/";
        $this->assertTrue(preg_match($regExpPattern, $validFrancePhoneNumber) === 1);
    }

    public function testMoroccanPhoneNumber()
    {
        // (212)-51-234-5678 - +212-51-234-5678 - 00212-51-234-5678 - +212512345678 - 0512345678 - 05 12 34 56 78 - 05.12.34.56.78 - 0512.345.678 - 0512 345-678

        $validMoroccoPhoneNumberWithSpecialChar = "0512 345-678";
        //$regExpPattern = "/^(0|\+212|00212)[1-9]{9}$/";
        $regExpPattern = "/^((\+|00)?\(?(212)\)?[-.\s]?([0-9]{3})[-.\s]?([0-9]{6})|([0-9]{2}\s?){4}[0-9]{2})$/";
        $this->assertMatchesRegularExpression($regExpPattern, preg_replace('/[^0-9+]/', '', $validMoroccoPhoneNumberWithSpecialChar));
    }

    public function testStandartLocalPhoneNumber(){
        $phoneNumber = "0633445566";

        $cleanPhoneNumber = preg_replace('/^(\+(33)|\+(212)|(0033)|(00212))/', '0', $phoneNumber);
        $this->assertEquals('0633445566', $cleanPhoneNumber);

    }

    public function testStandartInternaionalMoroccanPhoneNumber(){
        $phoneNumber = "06 33 44 55 66";
        $internationalPhoneNumber = preg_replace('/^(0)/', '+212', $phoneNumber);
        $this->assertEquals('0633445566', $internationalPhoneNumber);
    }

}
