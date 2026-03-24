<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testContactPageIsAccessible(): void
    {
        $client = static::createClient();

        $client->request('GET', '/contact');

        // Vérifie que la page répond bien (HTTP 200)
        $this->assertResponseIsSuccessful();

        // Vérifie qu’un formulaire est présent
        $this->assertSelectorExists('form');
    }

    public function testContactFormSubmissionWithValidData(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');

        $form = $crawler->filter('form')->form([
            'contact[name]' => 'Alexandre',
            'contact[email]' => 'alexandre@test.com',
            'contact[subject]' => 'Test sujet',
            'contact[message]' => 'Ceci est un message valide pour test.',
        ]);

        $client->submit($form);

        $this->assertResponseRedirects('/contact');

        $client->followRedirect();
        $this->assertResponseIsSuccessful();
    }

    public function testContactFormSubmissionWithInvalidData(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');

        $form = $crawler->filter('form')->form([
            'contact[name]' => '',
            'contact[email]' => 'email-invalide',
            'contact[subject]' => '',
            'contact[message]' => '',
        ]);

        $client->submit($form);

        $this->assertResponseStatusCodeSame(200);
    }
}