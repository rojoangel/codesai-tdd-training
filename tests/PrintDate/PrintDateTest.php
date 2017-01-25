<?php

namespace App\PrintDate;

class PrintDateTest extends \PHPUnit_Framework_TestCase
{
    const STUBBED_DATE = "2017-01-01 22:00:13";

    /** @var PrintDate */
    private $printDate;

    private $printer;

    /** @test */
    public function it_prints_using_handmade_doubles()
    {
        $this->printer = new PrinterSpy();
        $calendar = new StubbedCalendar(self::STUBBED_DATE);
        $this->printDate = new PrintDate($calendar, $this->printer);

        $this->printDate->printCurrentDate();
        $this->assertEquals(self::STUBBED_DATE, $this->printer->getValuePrinted());
    }

    /** @test */
    public function it_prints_using_prophesize()
    {
        $calendarProphecy = $this->prophesize(Calendar::class);
        $calendarProphecy->getDate()->willReturn(self::STUBBED_DATE);
        /** @var Calendar $calendar */
        $calendar = $calendarProphecy->reveal();
        $printer = new PrinterSpy();

        $this->printDate = new PrintDate($calendar, $printer);
        $this->printDate->printCurrentDate();
        $this->assertEquals(self::STUBBED_DATE, $printer->getValuePrinted());
    }
}