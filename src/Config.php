<?php

namespace onOffice\Api\Client\Gui;

/**
 * Class Config
 *
 * config
 * * api-url
 * * credential-directory
 *
 * @see config/ooapi.ini
 */

class Config
{
    private $config = [];

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__.'/../config/ooapi.ini');
    }

    public function getApiUrl(): string
    {
        return $this->config['url'];
    }
}