<?php

namespace App\PrintDate;

class Console implements Printer
{
    public function printLine($text)
    {
        echo $text;
    }
}
