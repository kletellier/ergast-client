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
    public function testDeserializeDriverStandings()
    {
        $httpResponse = $this->createHttpResponseFromFile('driverStandings.json', 'application/json; charset=utf-8');
        $ergastResponse = $this->deserializeHttpResponse($httpResponse);

        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Response', $ergastResponse); 
        $this->assertSame('f1', $ergastResponse->getSeries());
        $this->assertSame(47, $ergastResponse->getTotal());
        $this->assertSame(30, $ergastResponse->getLimit());
        $this->assertSame(0, $ergastResponse->getOffset());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $ergastResponse->getStandings());
        $this->assertCount(1, $ergastResponse->getStandings());

        $standings = $ergastResponse->getStandings()->first();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Standings', $standings);
        $this->assertSame(1989, $standings->getSeason());
        $this->assertSame(16, $standings->getRound());
        $this->assertCount(30, $standings->getDriverStandings());

        $driverStandings = $standings->getDriverStandings()->first();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\DriverStanding', $driverStandings);
        $this->assertSame('prost', $driverStandings->getDriver()->getId());
        $this->assertSame('mclaren', $driverStandings->getConstructors()->first()->getId());
        $this->assertSame(76.0, $driverStandings->getPoints());
        $this->assertSame(4, $driverStandings->getWins());
        $this->assertSame(1, $driverStandings->getPosition());
        $this->assertSame('1', $driverStandings->getPositionText());

        $driverStanding = $standings->getDriverStandings()->next();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\DriverStanding', $driverStandings);
        $this->assertSame('senna', $driverStanding->getDriver()->getId());
        $this->assertSame('mclaren', $driverStanding->getConstructors()->first()->getId());
        $this->assertSame(60.0, $driverStanding->getPoints());
        $this->assertSame(6, $driverStanding->getWins());
        $this->assertSame(2, $driverStanding->getPosition());
        $this->assertSame('2', $driverStanding->getPositionText());
    }

    public function testDeserializeConstructorStandings()
    {
        $httpResponse = $this->createHttpResponseFromFile('constructorStandings.json', 'application/json; charset=utf-8');
        $ergastResponse = $this->deserializeHttpResponse($httpResponse);

        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Response', $ergastResponse);
        $this->assertSame('f1', $ergastResponse->getSeries());
        $this->assertSame(20, $ergastResponse->getTotal());
        $this->assertSame(30, $ergastResponse->getLimit());
        $this->assertSame(0, $ergastResponse->getOffset());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $ergastResponse->getStandings());
        $this->assertCount(1, $ergastResponse->getStandings());

        $standings = $ergastResponse->getStandings()->first();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Standings', $standings);
        $this->assertSame(1989, $standings->getSeason());
        $this->assertSame(16, $standings->getRound());
        $this->assertCount(20, $standings->getConstructorStandings());

        $constructorStanding = $standings->getConstructorStandings()->first();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\ConstructorStanding', $constructorStanding);
        $this->assertSame('mclaren', $constructorStanding->getConstructor()->getId());
        $this->assertSame(141.0, $constructorStanding->getPoints());
        $this->assertSame(10, $constructorStanding->getWins());
        $this->assertSame(1, $constructorStanding->getPosition());
        $this->assertSame('1', $constructorStanding->getPositionText());

        $constructorStanding = $standings->getConstructorStandings()->next();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\ConstructorStanding', $constructorStanding);
        $this->assertSame('williams', $constructorStanding->getConstructor()->getId());
        $this->assertSame(77.0, $constructorStanding->getPoints());
        $this->assertSame(2, $constructorStanding->getWins());
        $this->assertSame(2, $constructorStanding->getPosition());
        $this->assertSame('2', $constructorStanding->getPositionText());
    }

    public function testDeserializeSeasons()
    {
        $httpResponse = $this->createHttpResponseFromFile('seasons.json', 'application/json; charset=utf-8');
        $ergastResponse = $this->deserializeHttpResponse($httpResponse);

        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Response', $ergastResponse);
        $this->assertSame('f1', $ergastResponse->getSeries());
        $this->assertSame(71, $ergastResponse->getTotal());
        $this->assertSame(30, $ergastResponse->getLimit());
        $this->assertSame(0, $ergastResponse->getOffset());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $ergastResponse->getSeasons());
        $this->assertCount(30, $ergastResponse->getSeasons());

        $season = $ergastResponse->getSeasons()->first();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Season', $season);
        $this->assertSame(1950, $season->getYear());
        $this->assertSame('https://en.wikipedia.org/wiki/1950_Formula_One_season', $season->getUrl());

        $season = $ergastResponse->getSeasons()->next();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Season', $season);
        $this->assertSame(1951, $season->getYear());
        $this->assertSame('https://en.wikipedia.org/wiki/1951_Formula_One_season', $season->getUrl());

        $season = $ergastResponse->getSeasons()->next();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Season', $season);
        $this->assertSame(1952, $season->getYear());
        $this->assertSame('https://en.wikipedia.org/wiki/1952_Formula_One_season', $season->getUrl());
    }

    public function testDeserializeFinishingStatus()
    {
        $httpResponse = $this->createHttpResponseFromFile('status.json', 'application/json; charset=utf-8');
        $ergastResponse = $this->deserializeHttpResponse($httpResponse);

        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Response', $ergastResponse); 
        $this->assertSame('f1', $ergastResponse->getSeries());
        $this->assertSame(38, $ergastResponse->getTotal());
        $this->assertSame(30, $ergastResponse->getLimit());
        $this->assertSame(0, $ergastResponse->getOffset());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $ergastResponse->getFinishingStatues());
        $this->assertCount(30, $ergastResponse->getFinishingStatues());

        $status = $ergastResponse->getFinishingStatues()->first();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\FinishingStatus', $status);
        $this->assertSame(1, $status->getId());
        $this->assertSame('Finished', $status->getName());
        $this->assertSame(65, $status->getCount());

        $status = $ergastResponse->getFinishingStatues()->next();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\FinishingStatus', $status);
        $this->assertSame(2, $status->getId());
        $this->assertSame('Disqualified', $status->getName());
        $this->assertSame(9, $status->getCount());

        $status = $ergastResponse->getFinishingStatues()->next();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\FinishingStatus', $status);
        $this->assertSame(3, $status->getId());
        $this->assertSame('Accident', $status->getName());
        $this->assertSame(5, $status->getCount());
    }

    public function testDeserializeCircuits()
    {
        $httpResponse = $this->createHttpResponseFromFile('circuits.json', 'application/json; charset=utf-8');
        $ergastResponse = $this->deserializeHttpResponse($httpResponse);

        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Response', $ergastResponse); 
        $this->assertSame('f1', $ergastResponse->getSeries());
        $this->assertSame(16, $ergastResponse->getTotal());
        $this->assertSame(30, $ergastResponse->getLimit());
        $this->assertSame(0, $ergastResponse->getOffset());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $ergastResponse->getCircuits());
        $this->assertCount(16, $ergastResponse->getCircuits());

        $circuit = $ergastResponse->getCircuits()->first();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Circuit', $circuit);
        $this->assertSame('adelaide', $circuit->getId());
        $this->assertSame('Adelaide Street Circuit', $circuit->getName());
        $this->assertSame('http://en.wikipedia.org/wiki/Adelaide_Street_Circuit', $circuit->getUrl());
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Location', $circuit->getLocation());
        $this->assertSame('Adelaide', $circuit->getLocation()->getLocality());
        $this->assertSame('Australia', $circuit->getLocation()->getCountry());
        $this->assertSame(-34.9272, $circuit->getLocation()->getLatitude());
        $this->assertSame(138.617, $circuit->getLocation()->getLongitude());
        $this->assertNull($circuit->getLocation()->getAltitude());

        $circuit = $ergastResponse->getCircuits()->next();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Circuit', $circuit);
        $this->assertSame('estoril', $circuit->getId());
        $this->assertSame('Autódromo do Estoril', $circuit->getName());
        $this->assertSame('http://en.wikipedia.org/wiki/Aut%C3%B3dromo_do_Estoril', $circuit->getUrl());
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Location', $circuit->getLocation());
        $this->assertSame('Estoril', $circuit->getLocation()->getLocality());
        $this->assertSame('Portugal', $circuit->getLocation()->getCountry());
        $this->assertSame(38.7506, $circuit->getLocation()->getLatitude());
        $this->assertSame(-9.39417, $circuit->getLocation()->getLongitude());
        $this->assertNull($circuit->getLocation()->getAltitude());
    }

    public function testDeserializeConstructors()
    {
        $httpResponse = $this->createHttpResponseFromFile('constructors.json', 'application/json; charset=utf-8');
        $ergastResponse = $this->deserializeHttpResponse($httpResponse);

        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Response', $ergastResponse);
        $this->assertSame('f1', $ergastResponse->getSeries());
        $this->assertSame(20, $ergastResponse->getTotal());
        $this->assertSame(30, $ergastResponse->getLimit());
        $this->assertSame(0, $ergastResponse->getOffset());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $ergastResponse->getConstructors());
        $this->assertCount(20, $ergastResponse->getConstructors());

        $constructor = $ergastResponse->getConstructors()->first();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Constructor', $constructor);
        $this->assertSame('ags', $constructor->getId());
        $this->assertSame('AGS', $constructor->getName());
        $this->assertSame('French', $constructor->getNationality());
        $this->assertSame('http://en.wikipedia.org/wiki/Automobiles_Gonfaronnaises_Sportives', $constructor->getUrl());

        $constructor = $ergastResponse->getConstructors()->next();
        $this->assertInstanceOf('BrieucThomas\ErgastClient\Model\Constructor', $constructor);
        $this->assertSame('arrows', $constructor->getId());
        $this->assertSame('Arrows', $constructor->getName());
        $this->assertSame('British', $constructor->getNationality());
        $this->assertSame('http://en.wikipedia.org/wiki/Arrows_Grand_Prix_International', $constructor->getUrl());
    }

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
