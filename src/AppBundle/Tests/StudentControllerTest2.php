<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StudentControllerTest2 extends WebTestCase
{

    public function test_it_lists_students()
    {
        //Test if Jean and Dupont
       /* $client = static::createClient();

        $crawler = $client->request('GET', '/admin/login');
        $form = $crawler->selectButton('_submit')->form();

        $form['_username'] = 'adminuser';
        $form['_password'] = 'admin';

        $client->submit($form);
        $crawler = $client->request('GET', '/admin/student');


        $this->assertContains('Jean', $client->getResponse()->getContent());
        $this->assertContains('Dupont', $client->getResponse()->getContent());*/



        //Connexion as administrator
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/login');
        $form = $crawler->selectButton('_submit')->form();

        $form['_username'] = 'adminuser';
        $form['_password'] = 'admin';

        $client->submit($form);

        $crawler = $client->request('GET', '/admin/student');
        //delete

        $client->request(
            'DELETE',
            '/admin/student/delete/10'


        );


    }


}
