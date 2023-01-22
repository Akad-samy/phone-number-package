<?php
namespace PhoneNumber;

class PhoneNumber
{

    public function verifyPhoneNumber(string $phoneNumber, string $country = 'ma'):bool
    {
        $moroccanRegExPattern = "/^((\+|00)?\(?(212)\)?[-.\s]?([0-9]{3})[-.\s]?([0-9]{6})|([0-9]{2}\s?){4}[0-9]{2})$/";
        $franceRegExPattern = "/^((\+|00)?\(?(33)\)?[-.\s]?([0-9]{3})[-.\s]?([0-9]{6})|([0-9]{2}\s?){4}[0-9]{2})$/";
        
        $regExpPattern = $country === 'ma' ? $moroccanRegExPattern : $franceRegExPattern;
        return preg_match($regExpPattern, $phoneNumber);

    }

    public function cleanPhoneNumber(string $phoneNumber):string
    {

        return preg_replace('/[^0-9+]/', '', $phoneNumber);

    }

    public function getPhoneNumberByType(string $phoneNumber, string $type = 'local'):string
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

    public function standardizePhoneNumber(string $number, ?string $type = 'local', ?string $country = 'ma')
    {
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

        if(!($this->verifyPhoneNumber($number))){
            return [
                'message'=>"invalid phone number",
            ];
        }

        $phoneNumberWithoutSpecialChar = $this->cleanPhoneNumber($number);

        return $this->getPhoneNumberByType($phoneNumberWithoutSpecialChar, 'international');
    }
}
