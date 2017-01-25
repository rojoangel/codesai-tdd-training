<?php

namespace App\PrintDate;

class PrintDate
{
    private $calendar;

    private $printer;

    public function __construct(Calendar $calendar, Printer $printer)
    {
        $this->printer = $printer;
        $this->calendar = $calendar;
    }

    public function printCurrentDate()
    {
        $this->consolePrint($this->getFormattedDate());
    }

    protected function getFormattedDate(){
        return $this->calendar->getDate();
    }

    protected function consolePrint($text)
    {
        $this->printer->printLine($text);
    }
}
