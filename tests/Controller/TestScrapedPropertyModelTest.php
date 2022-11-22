<?php

namespace App\Tests\Controller;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Component\HttpFoundation\Response;

class TestScrapedPropertyModelTest extends ApiTestCase
{
    /**
     * @throws TransportExceptionInterface
     */
    public function testApiMainEndpoint(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
    }

    /**
     * @return void
     * @throws TransportExceptionInterface
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws DecodingExceptionInterface
     */
    public function testGetPropertyById(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/v1/property/1ed6a309-a8ca-6a2c-a14e-79be4ffacc74')->toArray();

        $this->assertResponseIsSuccessful();
        $this->assertEquals('success', $crawler['message']);
        $this->assertResponseStatusCodeSame(Response::HTTP_OK, $crawler['message']);
        $this->assertEquals(null, $crawler['info']);
        $this->assertEquals('1ed6a309-a8ca-6a2c-a14e-79be4ffacc74', $crawler['data']['id']);
        $this->assertEquals('Teststraat', $crawler['data']['street']);
        $this->assertEquals(50, $crawler['data']['housenumber']);
    }
}
