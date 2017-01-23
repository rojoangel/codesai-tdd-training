<?php

class Encriptador
{
    function cryptWord($word)
    {
        if (substr_count($word, " ") > 0)
        {
            throw new Exception("Invalid word");
        }

        $wordArray = preg_split('//', $word, -1);
        $newWord = "";
        for ($i = 1; $i < count($wordArray) -1; $i++)
        {
            $charValue = ord($wordArray[$i]);
            $newWord = $newWord . chr($charValue + 2);
        }
        return $newWord;
    }

    function cryptWordToNumbers($word)
    {
        if (substr_count($word, " ") > 0)
        {
            throw new Exception("Invalid word");
        }

        $wordArray = preg_split('//', $word, -1);
        $newWord = "";
        for ($i = 1; $i < count($wordArray) -1; $i++)
        {
            $charValue = ord($wordArray[$i]);
            $newWord = $newWord . ($charValue + 2);
        }
        return $newWord;
    }

    function cryptSentence($word)
    {
        $wordArray = preg_split('//', $word, -1);
        $newWord = "";
        for ($i = 1; $i < count($wordArray) -1; $i++)
        {
            $charValue = ord($wordArray[$i]);
            $newWord = $newWord . chr($charValue + 2);
        }
        return $newWord;
    }

    function cryptWordPartially($word, $charsToReplace)
    {
        if (substr_count($word, " ") > 0)
        {
            throw new Exception("Invalid word");
        }

        $wordArray = preg_split('//', $word, -1);
        $replacement = preg_split('//', $charsToReplace, -1);
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
            echo "<" . $words[$i] . ">";
        }
    }

}