<?php

use PHPUnit\Framework\TestCase;
use onOffice\Api\Client\Gui\OnOfficeApiTester;
use onOffice\Api\Client\Gui\api\ApiResponse;
use onOffice\Api\Client\Gui\dataObjects\Credentials;
use onOffice\Api\Client\Gui\api\ApiRequest;

/**
 * Class OnOfficeApiTesterTest
 *
 * @covers \onOffice\Api\Client\Gui\OnOfficeApiTester
 * @uses \onOffice\Api\Client\Gui\Config
 *
 */

class OnOfficeApiTesterTest extends TestCase
{
    const JSON = '{"actionid":"urn:onoffice-de-ns:smart:2.5:smartml:action:read","resourceid":"resource-id","resourcetype":"estate","identifier":"","timestamp":1589567897,"hmac":"88462bce11c5c47fb738dba64a36ba00","parameters":{"data":["Id", "kaufpreis", "lage"]}}';
    const PASSWORD = 'test';

    public function testSend()
    {
        $apiRequest = $this->createMock(ApiRequest::class);
        $credentials = new Credentials('token', 'secret');

        $tester = new OnOfficeApiTester($apiRequest);
        $apiResponse = $tester->send(self::JSON, $credentials);
        $this->assertInstanceOf(ApiResponse::class, $apiResponse);
    }
}
