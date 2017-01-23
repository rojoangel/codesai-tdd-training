<?php

namespace App\Parser;

class InputParser
{
    public function parse($input)
    {
        $upperCaseInput = mb_strtoupper($input);
        $accentFreeInput = $this->removeAccents($upperCaseInput);
        $tokens = preg_split('/\s+/', $accentFreeInput);
        return $tokens;
    }

    private function removeAccents($input)
    {
        $originalChars = 'ÁÉÍÓÚáéíóú';
        $normalizedChars = 'AEIOUaeiou';
        $decodedString = utf8_decode($input);
        return strtr($decodedString, utf8_decode($originalChars), $normalizedChars);
    }
}
