<?php

namespace App\PrintDate;

class PrinterSpy implements Printer
{
    private $valuePrinted;

    public function printLine($text)
    {
        $this->valuePrinted = $text;
    }

    public function getValuePrinted()
    {
        return $this->valuePrinted;
    }

}
