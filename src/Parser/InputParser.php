<?php

namespace App\Parser;

class InputParser
{
    public function parse($input)
    {
        $parsedInput = [];
        $tokens = $this->tokenize($input);
        foreach ($tokens as $token) {
            $parsedInput[] = $this->removeAccents($this->uppercase($token));
        }
        return $parsedInput;
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
