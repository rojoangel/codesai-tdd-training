<?php

namespace App\SearchEngine;

class SearchEngine
{
    /** @var  UserRepository */
    private $userRepository;

    /** @var  Parser */
    private $parser;

    public function __construct($userRepository, $parser)
    {
        $this->userRepository = $userRepository;
        $this->parser = $parser;
    }

    public function filter($query, $location)
    {
        $filteredUsers = [];

        $foundUsers = $this->userRepository->findByLocation($location);
        foreach ($foundUsers as $user) {
            if ($this->matches($user, $query)) {
                $filteredUsers[] = $user;
            }
        }

        return $filteredUsers;
    }

    private function matches($user, $query)
    {
        $tokens = $this->parser->parse($query);
        return in_array($user->getProfile(), $tokens);
    }
}
