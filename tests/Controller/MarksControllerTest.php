<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 4/11/2019
 * Time: 9:42 AM
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MarksControllerTest extends WebTestCase
{
    public function testCreateMarks()
    {
        $client = static::createClient();

        $client->request('POST', '/marks/create/1?mark_value=7');

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }

    public function testCreateMarksWithoutMark()
    {
        $client = static::createClient();

        $client->request('POST', '/marks/create/1?mark_value=');

        $this->assertEquals(422, $client->getResponse()->getStatusCode());
    }

    public function testCreateMarksWithWrongMark()
    {
        $client = static::createClient();

        $client->request('POST', '/marks/create/1?mark_value=11');

        $this->assertEquals(422, $client->getResponse()->getStatusCode());
    }

}