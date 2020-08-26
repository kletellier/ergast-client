<?php

/*
 * (c) Brieuc Thomas <tbrieuc@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\BrieucThomas\ErgastClient;

use BrieucThomas\ErgastClient\ErgastClient;
use BrieucThomas\ErgastClient\Model\Response as ErgastResponse;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response as HttpResponse;
use JMS\Serializer\SerializerBuilder;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ErgastClientTest extends \PHPUnit_Framework_TestCase
{
    

    public function testDeserializeDrivers()
    {
        $httpResponse = $this->createHttpResponseFromFile('drivers.json', 'application/json; charset=utf-8');
        $ergastResponse = $this->deserializeHttpResponse($httpResponse);

        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Response', $ergastResponse);        
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $ergastResponse->getDrivers());        
        $this->assertCount(30, $ergastResponse->getDrivers());
        $this->assertSame(848, $ergastResponse->getTotal());

        $driver = $ergastResponse->getDrivers()->first();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Driver', $driver);
        $this->assertSame('abate', $driver->getId());
        $this->assertEmpty($driver->getCode());
        $this->assertSame('Carlo', $driver->getGivenName());
        $this->assertSame('Abate', $driver->getFamilyName());
        $this->assertInstanceOf('\DateTime', $driver->getBirthDate());
        $this->assertSame('1932-07-10T00:00:00+0000', $driver->getBirthDate()->format(\DateTime::ISO8601));
        $this->assertSame('Italian', $driver->getNationality());
        $this->assertNull($driver->getNumber());
        $this->assertSame('http://en.wikipedia.org/wiki/Carlo_Mario_Abate', $driver->getUrl());

        $driver = $ergastResponse->getDrivers()->next();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Driver', $driver);
        $this->assertSame('abecassis', $driver->getId());
        $this->assertEmpty($driver->getCode());
        $this->assertSame('George', $driver->getGivenName());
        $this->assertSame('Abecassis', $driver->getFamilyName());
        $this->assertInstanceOf('\DateTime', $driver->getBirthDate());
        $this->assertSame('1913-03-21T00:00:00+0000', $driver->getBirthDate()->format(\DateTime::ISO8601));
        $this->assertSame('British', $driver->getNationality());
        $this->assertNull($driver->getNumber());
        $this->assertSame('http://en.wikipedia.org/wiki/George_Abecassis', $driver->getUrl());

    }     

    private function createHttpResponseFromFile(string $fixture, string $contentType): HttpResponse
    {
        $body = file_get_contents($this->getFixtureDir().'/'.$fixture);

        return $this->createHttpResponse($body, $contentType);
    }

    private function createHttpResponse(string $body, string $contentType, $status = 200): HttpResponse
    {
        return new HttpResponse($status, ['Content-Type' => $contentType], $body);
    }

    private function deserializeHttpResponse(HttpResponse $httpResponse): ErgastResponse
    {
        $httpClient = $this->createHttpClient($httpResponse);
        $serializer = SerializerBuilder::create()->build();
        $ergastClient = new ErgastClient($httpClient, $serializer);
        $httpRequest = $this->createHttpRequest();

        return $ergastClient->execute($httpRequest);
    }

    private function createHttpClient(ResponseInterface $httpResponse): ClientInterface
    {
        $httpClient = $this
            ->getMockBuilder('GuzzleHttp\ClientInterface')
            ->getMock()
        ;

        $httpClient
            ->method('send')
            ->willReturn($httpResponse)
        ;

        return $httpClient;
    }

    private function createHttpRequest(): RequestInterface
    {
        return $this
            ->getMockBuilder('Psr\Http\Message\RequestInterface')
            ->getMock()
        ;
    }

    private function getRootDir(): string
    {
        return __DIR__.'/../../..';
    }

    private function getFixtureDir(): string
    {
        return __DIR__.'/data';
    }
}
