<?php

use PHPUnit\Framework\TestCase;
use onOffice\Api\Client\Gui\api\Hmac;
use onOffice\Api\Client\Gui\dataObjects\RequestWithAuthInfos;
use onOffice\Api\Client\Gui\dataObjects\Credentials;
use onOffice\Api\Client\Gui\dataObjects\Resource;
use onOffice\Api\Client\Gui\dataObjects\Action;
use onOffice\Api\Client\Gui\dataObjects\Request;

/**
 * @covers \onOffice\Api\Client\Gui\api\Hmac
 * @uses \onOffice\Api\Client\Gui\dataObjects\Resource
 * @uses \onOffice\Api\Client\Gui\dataObjects\Action
 * @uses \onOffice\Api\Client\Gui\dataObjects\Credentials
 * @uses \onOffice\Api\Client\Gui\dataObjects\RequestWithAuthInfos
 * @uses \onOffice\Api\Client\Gui\dataObjects\Request
 */

class HmacTest extends TestCase
{
    public function testCreate(): void
    {
        $credentials = new Credentials('token', 'secret');
        $resource = new Resource('1', 'type');
        $action = new Action('action', 'identifier');
        $parameters = ['paramKey' => 'paramValue'];
        $request = new Request($action, $resource, $parameters);
        $requestValues = new RequestWithAuthInfos($credentials, $request, 100);
        $hmac = new Hmac();

        $this->assertEquals('7e0bb4b6ceb4b3cff609524e416f2ac3', $hmac->create($requestValues));
    }
}
