<?php

namespace PhoneNumberPackage;

use PhoneNumberInterface;
use PhoneNumberService;

class PhoneNumber
{
    private $phoneNumber;

    public function __construct()
    {
    }

    public static function standardizePhoneNumber(string $number, ?string $type = 'local', ?string $country = 'ma')
    {
        $phoneNumber = new PhoneNumberService();
        if(!$phoneNumber){
            return [
                'message'=>"phone number is required",
            ];
        }

        if(!in_array($type, ['local', 'international'])){
            return [
                'message'=>"type must be local or international",
            ];
        }

        if(!in_array($country, ['ma', 'fr'])){
            return [
                'message'=>"country must be 'ma' or 'fr'",
            ];
        }

        if(!($phoneNumber->verifyPhoneNumber($number))){
            return [
                'message'=>"invalid phone number",
            ];
        }
        return 'hello world';

    }
}
