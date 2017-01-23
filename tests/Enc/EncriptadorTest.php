<?php

namespace Enc;

class EncriptadorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $word
     * @param $expected
     *
     *  @dataProvider wordsProvider
     */
    public function testCryptWord($word, $expected)
    {
        $encriptador = new Encriptador();
        $this->assertEquals($expected, $encriptador->cryptWord($word));
    }

    public function wordsProvider()
    {
        return [
            ["Hello", "Jgnnq"],
            ["Bye", "D{g"],
            ["Dog", "Fqi"]
         ];
    }

    /**
     * @expectedException \Exception
     */
    public function testCryptoWordError()
    {
        $encriptador = new Encriptador();
        $encriptador->cryptWord("A B");

    }

    /**
     * @param $word
     * @param $expected
     * @dataProvider wordToNumberProvider
     */
    public function testCryptWordToNumbers($word, $expected)
    {
        $encriptador = new Encriptador();
        $this->assertEquals($expected, $encriptador->cryptWordToNumbers($word));
    }

    public function wordToNumberProvider()
    {
        return [
            ["Hello", "74103110110113"],
            ["Bye", "68123103"],
            ["Dog", "70113105"]
        ];
    }

    /**
     * @expectedException \Exception
     */
    public function testCryptWordToNumbersError()
    {
        $encriptador = new Encriptador();
        $encriptador->cryptWordToNumbers("A B");

    }

    /**
     * @param $word
     * @param $expected
     * @dataProvider sentencesProvider
     */
    public function testCryptSentence($word, $expected)
    {
        $encriptador = new Encriptador();
        $this->assertEquals($expected, $encriptador->cryptSentence($word));
    }

    public function sentencesProvider()
    {
        return [
            ["Hello World!", "Jgnnq\"Yqtnf#"],
            ["Bye World!", "D{g\"Yqtnf#"],
            ["Dog Food", "Fqi\"Hqqf"]
        ];
    }

    /**
     * @param $word
     * @param $expected
     * @dataProvider wordPartiallyProvider
     */
    public function testCryptWordPartially($word, $charsToReplace, $expected)
    {
        $encriptador = new Encriptador();
        $this->assertEquals($expected, $encriptador->cryptWordPartially($word, $charsToReplace));
    }

    public function wordPartiallyProvider()
    {
        return [
            ["Hello", "o", "Hellq"],
            ["Bye", "o", "Bye"],
            ["Dog", "D", "Fog"]
        ];
    }

    /**
     * @expectedException \Exception
     */
    public function testCryptWordPartiallyError()
    {
        $encriptador = new Encriptador();
        $encriptador->cryptWordPartially("A B", "A");
    }
}
