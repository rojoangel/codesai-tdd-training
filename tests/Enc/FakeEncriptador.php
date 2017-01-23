<?php

namespace Enc;

class FakeEncriptador extends Encriptador
{
    private $result ="";

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    protected function printResult($words, $i)
    {
        $this->result = $this->result . "<" . $words[$i] . ">";
    }
}
