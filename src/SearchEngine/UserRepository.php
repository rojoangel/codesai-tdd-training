<?php

namespace App\SearchEngine;

interface UserRepository
{
    public function findByLocation($location);
    public function save($user);
}
