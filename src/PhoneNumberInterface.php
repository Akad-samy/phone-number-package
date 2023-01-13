<?php

interface PhoneNumberInterface
{
    public function verifyPhoneNumber(string $phoneNumber, string $country = 'ma'):bool;
    public function cleanPhoneNumber(string $phoneNumber):string;
    public function getPhoneNumberByType(string $phoneNumber, string $type = 'local'):string;
}