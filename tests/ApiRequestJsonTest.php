<?php

use PHPUnit\Framework\TestCase;
use onOffice\Api\Client\Gui\api\ApiRequestJson;
use onOffice\Api\Client\Gui\dataObjects\Credentials;
use onOffice\Api\Client\Gui\dataObjects\Resource;
use onOffice\Api\Client\Gui\dataObjects\Action;
use onOffice\Api\Client\Gui\dataObjects\RequestWithAuthInfos;
use onOffice\Api\Client\Gui\dataObjects\Request;

/**
 * @covers \onOffice\Api\Client\Gui\api\ApiRequestJson
 * @uses \onOffice\Api\Client\Gui\dataObjects\Credentials
 * @uses \onOffice\Api\Client\Gui\dataObjects\Action
 * @uses \onOffice\Api\Client\Gui\dataObjects\RequestWithAuthInfos
 * @uses \onOffice\Api\Client\Gui\dataObjects\Resource
 * @uses \onOffice\Api\Client\Gui\dataObjects\Request
 */

class ApiRequestJsonTest extends TestCase
{
    public function testBuild(): void
    {
        $credentials = new Credentials('token', 'secret');
        $resource = new Resource(1, 'address');
        $action = new Action('read', 'identifier');
        $parameters = ['paramKey' => 'paramValue'];
        $request = new Request($action, $resource, $parameters);
        $requestValues = new RequestWithAuthInfos($credentials, $request, 0);
        $hmac = 'hmac-test';

        $requestJson = new ApiRequestJson();
        $jsonString = $requestJson->build($requestValues, $hmac);
        $this->assertIsString($jsonString);

        $json = json_decode($jsonString, true);
        $this->checkJsonStructure($json);

        $jsonAction = $json['request']['actions'][0];
        $this->checkJsonAction($jsonAction);

        $jsonParameters = $jsonAction['parameters'];
        $this->checkJsonParameters($jsonParameters);
    }

    private function checkJsonAction($jsonAction): void
    {
        $this->assertArrayHasKey('actionid', $jsonAction);
        $this->assertEquals('read', $jsonAction['actionid']);

        $this->assertArrayHasKey('resourceid', $jsonAction);
        $this->assertEquals('1', $jsonAction['resourceid']);

        $this->assertArrayHasKey('resourcetype', $jsonAction);
        $this->assertEquals('address', $jsonAction['resourcetype']);

        $this->assertArrayHasKey('identifier', $jsonAction);
        $this->assertEquals('identifier', $jsonAction['identifier']);

        $this->assertArrayHasKey('timestamp', $jsonAction);
        $this->assertEquals('0', $jsonAction['timestamp']);

        $this->assertArrayHasKey('hmac', $jsonAction);
        $this->assertEquals('hmac-test', $jsonAction['hmac']);

        $this->assertArrayHasKey('parameters', $jsonAction);
        $this->assertCount(1, $jsonAction['parameters']);
    }

    private function checkJsonStructure($json): void
    {
        $this->assertIsArray($json);
        $this->assertArrayHasKey('token', $json);
        $this->assertEquals('token', $json['token']);
        $this->assertArrayHasKey('request', $json);
        $this->assertArrayHasKey('actions', $json['request']);
        $this->assertCount(1, $json['request']['actions']);
        $this->assertArrayHasKey(0, $json['request']['actions']);
    }

    private function checkJsonParameters($jsonParameters): void
    {
        $this->assertArrayHasKey('paramKey', $jsonParameters);
        $this->assertEquals('paramValue', $jsonParameters['paramKey']);
    }
}
