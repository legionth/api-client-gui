<?php

namespace onOffice\Api\Client\Gui\api;
use Symfony\Component\HttpClient\NativeHttpClient;
use onOffice\Api\Client\Gui\dataObjects\RequestWithAuthInfos;

/**
 * Class ApiRequest
 *
 * send requests to onOffice-API
 */

class ApiRequest
{
    public function send(string $apiUrl, RequestWithAuthInfos $requestValues): ApiResponse
    {
        $httpClient = new NativeHttpClient();
        $apiRequestJson = new ApiRequestJson();
        $hmac = new Hmac();
        $json = $apiRequestJson->build($requestValues, $hmac->create($requestValues));
        $options['body'] = $json;
        $response = $httpClient->request('POST', $apiUrl, $options);
        return new ApiResponse($response->getContent());
    }
}