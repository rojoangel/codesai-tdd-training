<?php

namespace App\SearchEngine;

class User
{
    private $name;
    private $profile;
    private $location;

    public function __construct($name, $profile, $location)
    {
        $this->name = $name;
        $this->profile = $profile;
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

}
