<?php

namespace App\Parser;

class Tokenizer
{
    public function split($input)
    {
        return preg_split('/\s+/', $input);
    }
}
