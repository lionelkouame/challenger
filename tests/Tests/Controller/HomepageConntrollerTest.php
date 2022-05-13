<?php

namespace App\Tests\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomepageConntrollerTest extends WebTestCase
{
    public function testPageSucess() {
        $client = static::createClient();
        $client->request('GET', 'homepage');

        $this->assertResponseStatusCodeSame(200, Response::HTTP_OK);
    }


}
