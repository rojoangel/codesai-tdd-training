<?php

namespace App\Enc;

class Encriptador
{
    function cryptWord($word)
    {
        $this->validateWord($word);

        $encryptLogic = function ($newWord, $charValue) {
            return $newWord . chr($charValue + 2);
        };

        return $this->crypt($encryptLogic, $word);
    }

    function cryptWordToNumbers($word)
    {
        $this->validateWord($word);

        $encryptLogic = function ($newWord, $charValue) {
            return $newWord . ($charValue + 2);
        };

        return $this->crypt($encryptLogic, $word);

    }

    function cryptSentence($word)
    {
        $encryptLogic = function ($newWord, $charValue) {
            return $newWord . chr($charValue + 2);
        };

        return $this->crypt($encryptLogic, $word);
    }

    function cryptWordPartially($word, $charsToReplace)
    {
        $this->validateWord($word);

        $wordArray = $this->splitToChars($word);
        $replacement = $this->splitToChars($charsToReplace);
        $newWord = "";
        for ($i = 1; $i < count($wordArray) -1; $i++)
        {
            for ($j = 1; $j < count($replacement) -1; $j++)
            {
                if ($replacement[$j] == $wordArray[$i])
                {
                    $charValue = ord($wordArray[$i]);
                    $newWord = $newWord . chr($charValue + 2);
                }
                else
                {
                    $newWord = $newWord . $wordArray[$i];
                }
            }
        }
        return $newWord;
    }

    function getWords($sentence)
    {
        return explode(" ", $sentence);
    }

    function printWords($sentence)
    {
        $words = $this->getWords($sentence);
        for ($i = 0; $i < count($words); $i++)
        {
            $this->printResult($words, $i);
        }
    }

    /**
     * @param $words
     * @param $i
     */
    protected function printResult($words, $i)
    {
        echo "<" . $words[$i] . ">";
    }

    /**
     * @param $word
     * @throws \Exception
     */
    private function validateWord($word)
    {
        if (substr_count($word, " ") > 0) {
            throw new \Exception("Invalid word");
        }
    }

    /**
     * @param $word
     * @return array
     */
    private function splitToChars($word)
    {
        $wordArray = preg_split('//', $word, -1);
        return $wordArray;
    }

    /**
     * @param $word
     * @return string
     */
    private function crypt($encryptLogic, $word)
    {
        $wordArray = $this->splitToChars($word);
        $newWord = "";
        for ($i = 1; $i < count($wordArray) - 1; $i++) {
            $charValue = ord($wordArray[$i]);
            $newWord = $encryptLogic($newWord, $charValue);
        }
        return $newWord;
    }
}