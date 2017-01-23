<?php

namespace App\Parser;

class InputParserTest extends \PHPUnit_Framework_TestCase
{
    public function test_ignores_case()
    {
        $inputParser = new InputParser();
        $this->assertEquals(["COCINERO"], $inputParser->parse("cocinero"));
        $this->assertEquals(["FONTANERO"], $inputParser->parse("fontanero"));
    }

    public function test_splits_words()
    {
        $inputParser = new InputParser();
        $this->assertEquals(["COCINERO", "FONTANERO"], $inputParser->parse("COCINERO FONTANERO"));
        $this->assertEquals(["COCINERO", "FONTANERO"], $inputParser->parse("COCINERO    FONTANERO"));
    }
}
