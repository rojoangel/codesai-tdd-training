<?php

namespace App\SearchEngine;

class SearchEngineTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function no_user_found_on_empty_repository()
    {
        $repositoryProphecy = $this->prophesize(UserRepository::class);
        $repositoryProphecy->findByLocation('ANYWHERE')->willReturn([]);
        $parser = null;
        $searchEngine = new SearchEngine($repositoryProphecy->reveal(), $parser);
        $this->assertEquals([], $searchEngine->filter('DUMMY', 'ANYWHERE'));
    }

    /** @test */
    public function no_user_found_when_query_does_not_match_user()
    {
        $user = new User('Name', 'COCINERO', 'BARCELONA');
        $repositoryProphecy = $this->prophesize(UserRepository::class);
        $repositoryProphecy->findByLocation('BARCELONA')->willReturn([$user]);

        $parserProphecy = $this->prophesize(Parser::class);
        $parserProphecy->parse("TORERO")->willReturn(["TORERO"]);

        $searchEngine = new SearchEngine($repositoryProphecy->reveal(), $parserProphecy->reveal());
        $this->assertEquals([], $searchEngine->filter('TORERO', 'BARCELONA'));
    }

    /** @test */
    public function user_found_when_query_matches_user()
    {
        $user = new User('Name', 'TORERO', 'BARCELONA');
        $repositoryProphecy = $this->prophesize(UserRepository::class);
        $repositoryProphecy->findByLocation('BARCELONA')->willReturn([$user]);

        $parserProphecy = $this->prophesize(Parser::class);
        $parserProphecy->parse("TORERO")->willReturn(["TORERO"]);

        $searchEngine = new SearchEngine($repositoryProphecy->reveal(), $parserProphecy->reveal());
        $this->assertEquals([$user], $searchEngine->filter('TORERO', 'BARCELONA'));
    }
}
