<?php

class PhoneNumberService
{

    private $moroccanRegExPattern = "/^((\+|00)?\(?(212)\)?[-.\s]?([0-9]{3})[-.\s]?([0-9]{6})|([0-9]{2}\s?){4}[0-9]{2})$/";
    private $franceRegExPattern = "/^((\+|00)?\(?(33)\)?[-.\s]?([0-9]{3})[-.\s]?([0-9]{6})|([0-9]{2}\s?){4}[0-9]{2})$/";
    
    static function verifyPhoneNumber(string $phoneNumber, string $country = 'ma'):bool
    {

        $regExpPattern = $country === 'ma' ? $this->moroccanRegExPattern : $this->franceRegExPattern;
        return preg_match($regExpPattern, $phoneNumber);

    }

    static function cleanPhoneNumber(string $phoneNumber):string
    {

        return preg_replace('/[^0-9+]/', '', $phoneNumber);

    }

    static function getPhoneNumberByType(string $phoneNumber, string $type = 'local'):string
    {
        if($type === 'international'){

            $regExpPattern = '/^(0)/';
            $replacement = '+212';

        }elseif($type === 'local'){

            $regExpPattern = '/^(\+(33)|\+(212)|(0033)|(00212))/';
            $replacement = '0';

        }

        return preg_replace($regExpPattern, $replacement, $phoneNumber);
    }

}