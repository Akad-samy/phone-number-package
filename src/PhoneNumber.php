<?php

namespace PhoneNumberPackage;

use PhoneNumberService;

class PhoneNumber
{
    public static function standardizePhoneNumber(string $number, ?string $type = 'local', ?string $country = 'ma')
    {
        $t = new PhoneNumberService();
        if(!$number){
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

        if(!($t->verifyPhoneNumber($number))){
            return [
                'message'=>"invalid phone number",
            ];
        }

        $phoneNumberWithoutSpecialChar = $t->cleanPhoneNumber($number);

        return $t->getPhoneNumberByType($phoneNumberWithoutSpecialChar, 'international');
    }
}
