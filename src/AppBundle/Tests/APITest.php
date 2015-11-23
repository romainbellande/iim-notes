<?php
/**
 * Created by PhpStorm.
 * User: guillaumenouhaud
 * Date: 23/11/2015
 * Time: 13:01
 */

namespace AppBundle\Tests;




use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class APITest extends WebTestCase
{
    public function test_it_lists_students()
    {
        $client = static::createClient([], [
            'X-Token' => 'monapitoken' // à changer !
        ]);

        $crawler = $client->request('GET', '/api/students');
        $crawler = $client->request('GET', '/api/grades');
        $crawler = $client->request('GET', '/api/exams');

        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            )
        );
    }

}