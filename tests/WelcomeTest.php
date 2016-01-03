<?php
use Goutte\Client;

class WelcomeTest extends TestCase{

public function TestUserSeesWelcomeMessage(){

    $client= new Client();
    $crawler = $client->request('GET', 'http://homestead.app/');
    $this->assertEquals(200, $client->getResponse()->getStatus());
    $this->assertCount(1, $crawler->filter('h1:contains("Welcome to TODOParrot")'));


}
    public function testUserClicksContactLinkAndIsTakenToContactPage()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'http://homestead.app/');
        $link = $crawler->selectLink('Contact Us')->link();
        $this->assertEquals('http://homestead.app/about/contact',
            $link->getUri());
        $crawler = $client->click($link);
        $this->assertCount(1, $crawler->filter('h1:contains("Contact Us")'));
    }

}