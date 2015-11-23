<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StudentControllerAddTest extends WebTestCase
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

        //add student
        $crawler = $client->request('GET', '/admin/student/add');

        // Fill in the form and submit it

        $form2 = $crawler->selectButton('_save')->form();

        $form2['appbundle_student[email]'] = 'test';
        $form2['appbundle_student[firstName]'] = 'test';
        $form2['appbundle_student[lastName]'] = 'test';



        $client->submit($form2);

    }


  /*  public function delete()
    {


        //Connexion as administrator
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/login');
        $form = $crawler->selectButton('_submit')->form();

        $form['_username'] = 'adminuser';
        $form['_password'] = 'admin';

        $client->submit($form);

        $crawler = $client->request('GET', '/admin/student');
        //delete


        $link = $crawler->selectLink('/admin/student/delete/6')->link();

        $client->click($link);

    }*/

}
