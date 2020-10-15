<?php

use PHPUnit\Framework\TestCase;
use onOffice\Api\Client\Gui\Config;
use onOffice\Api\Client\Gui\api\ApiRequest;
use onOffice\Api\Client\Gui\api\ApiResponse;
use onOffice\Api\Client\Gui\dataObjects\RequestWithAuthInfos;
use onOffice\Api\Client\Gui\dataObjects\Credentials;
use onOffice\Api\Client\Gui\dataObjects\Resource;
use onOffice\Api\Client\Gui\dataObjects\Action;
use onOffice\Api\Client\Gui\dataObjects\Request;

/**
 * @covers \onOffice\Api\Client\Gui\api\ApiRequest
 * @uses \onOffice\Api\Client\Gui\Config
 * @uses \onOffice\Api\Client\Gui\dataObjects\Credentials
 * @uses \onOffice\Api\Client\Gui\dataObjects\Action
 * @uses \onOffice\Api\Client\Gui\dataObjects\Resource
 * @uses \onOffice\Api\Client\Gui\dataObjects\RequestWithAuthInfos
 * @uses \onOffice\Api\Client\Gui\Hmac
 * @uses \onOffice\Api\Client\Gui\ApiResponse
 * @uses \onOffice\Api\Client\Gui\ApiRequestJson
 * @uses \onOffice\Api\Client\Gui\dataObjects\Request
 */

class ApiRequestTest extends TestCase
{
    public function testRequest(): void
    {
        $config = new Config('config/ooapi.ini');
        $apiRequest = new ApiRequest();
        $credentials = new Credentials('token', 'secret');
        $resource = new Resource(1, 'address');
        $action = new Action('read');
        $request = new Request($action, $resource, []);
        $requestValues = new RequestWithAuthInfos($credentials, $request, 0);

        $apiResponse = $apiRequest->send($config->getApiUrl(), $requestValues);
        $this->assertInstanceOf(ApiResponse::class, $apiResponse);
        $this->assertEquals(400, $apiResponse->getCode());
    }
}
