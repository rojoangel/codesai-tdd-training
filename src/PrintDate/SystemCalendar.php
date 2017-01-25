<?php

namespace App\PrintDate;

class SystemCalendar implements Calendar
{

    public function getDate()
    {
        return date("Y-m-d H:i:s");
    }
}
