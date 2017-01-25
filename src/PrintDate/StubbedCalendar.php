<?php

namespace App\PrintDate;

class StubbedCalendar implements Calendar
{
    private $stubbedDate;

    public function __construct($stubbedDate)
    {
        $this->stubbedDate = $stubbedDate;
    }

    public function getDate()
    {
        return $this->stubbedDate;
    }
}
