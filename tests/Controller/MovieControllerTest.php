<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 4/11/2019
 * Time: 9:42 AM
 */

namespace App\Tests\Controller;


use Doctrine\DBAL\Exception\DatabaseObjectNotFoundException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MovieControllerTest extends WebTestCase
{
    public function testShowMovies()
    {
        $client = static::createClient();

        $client->request('GET', '/movies');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testShowMovie()
    {
        $client = static::createClient();

        $client->request('GET', '/movies/details/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}