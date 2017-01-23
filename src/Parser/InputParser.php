<?php

namespace App\Parser;

class InputParser
{
    public function parse($input)
    {
        $upperCaseInput = strtoupper($input);
        $tokens = preg_split('/\s+/', $upperCaseInput);
        return $tokens;
    }
}
