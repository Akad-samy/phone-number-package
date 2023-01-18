<?php

namespace PhoneNumberPackage;

use PhoneNumberInterface;

class PhoneNumber
{
    private $phoneNumber;

    public function __construct(PhoneNumberInterface $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public static function standardizePhoneNumber(string $phoneNumber, ?string $type = 'local', ?string $country = 'ma')
    {
        return 'hello world';
        // if(!$phoneNumber){
        //     throw new Exception("phone number is required", 400);
        // }

        // if(!in_array($type, ['local', 'international'])){
        //     throw new Exception("type must be local or international", 400);
        // }

        // if(!in_array($country, ['ma', 'fr'])){
        //     throw new Exception("country must be 'ma' or 'fr'", 400);
        // }

        // if(!($this->phoneNumber->verifyPhoneNumber($phoneNumber))){
        //     throw new Exception("invalid phone number", 400);
        // }
        // return 'hello world';

    }
}
