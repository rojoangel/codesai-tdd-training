<?php

namespace App\Parser;

class InputParser
{
    private $tokenizer;

    public function __construct()
    {
        $this->tokenizer = new Tokenizer();
    }

    public function parse($input)
    {
        $parsedInput = [];
        $tokens = $this->tokenizer->split($input);
        foreach ($tokens as $token) {
            $parsedInput[] = $this->normalize($token);
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

    private function removePluralEnding($input)
    {
        if ($this->endsWith($input, "S")) {
            return substr($input, 0, strlen($input) - 1);
        }
        return $input;
    }

    private function endsWith($haystack, $needle)
    {
        return (substr($haystack, -1) === $needle);
    }

    private function normalize($token)
    {
        return $this->removePluralEnding(
            $this->removeAccents(
                $this->uppercase($token)));
    }
}
