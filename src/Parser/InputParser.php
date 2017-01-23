<?php

namespace App\Parser;

class InputParser
{
    public function parse($input)
    {
        $upperCaseInput = $this->uppercase($input);
        $accentFreeInput = $this->removeAccents($upperCaseInput);
        return $this->tokenize($accentFreeInput);
    }

    private function removeAccents($input)
    {
        $originalChars = 'ÁÉÍÓÚáéíóú';
        $normalizedChars = 'AEIOUaeiou';
        $decodedString = utf8_decode($input);
        return strtr($decodedString, utf8_decode($originalChars), $normalizedChars);
    }

    private function uppercase($input)
    {
        return mb_strtoupper($input);
    }

    private function tokenize($input)
    {
        return preg_split('/\s+/', $input);
    }
}
