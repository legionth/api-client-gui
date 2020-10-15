<?php

namespace onOffice\Api\Client\Gui;
use onOffice\Api\Client\Gui\dataObjects\RequestWithAuthInfos;
use onOffice\Api\Client\Gui\api\ApiRequest;
use onOffice\Api\Client\Gui\api\ApiResponse;
use onOffice\Api\Client\Gui\dataObjects\Credentials;

/**
 * Class OnOfficeApiTester
 *
 * main-class / "business logic"
 */

class OnOfficeApiTester
{
    private $apiRequest = null;

    public function __construct(ApiRequest $apiRequest)
    {
        $this->apiRequest = $apiRequest;
    }

    public function send($jsonString, Credentials $credentials): ApiResponse
    {
        $config = new Config();

        $dataFactory = new DataFactory();
        $request = $dataFactory->createRequestFromString($jsonString);
        $requestValues = new RequestWithAuthInfos($credentials, $request, time());

        return $this->apiRequest->send($config->getApiUrl(), $requestValues);
    }
}