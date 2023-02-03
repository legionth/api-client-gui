<?php

namespace onOffice\Api\Client\Gui;
use onOffice\Api\Client\Gui\dataObjects\Action;
use onOffice\Api\Client\Gui\dataObjects\Resource;
use onOffice\Api\Client\Gui\api\JsonParseException;
use onOffice\Api\Client\Gui\dataObjects\Request;

/**
 * Class DataFactory
 *
 * create data-objects from json-string
 *
 */

class DataFactory
{
    public function createRequestFromString($jsonString): Request
    {
        $json = $this->parseJsonString($jsonString);
        $action = new Action($json->actionid);
        $resource = new Resource($json->resourceid, $json->resourcetype);
        $parameters = (array) $json->parameters;
        return new Request($action, $resource, $parameters);
    }

    private function parseJsonString($jsonString): object
    {
        $json = json_decode($jsonString);

        if ($json === null)
        {
            throw new JsonParseException();
        }

        return $json;
    }
}