<?php

use PHPUnit\Framework\TestCase;
use onOffice\Api\Client\Gui\Config;

/**
 * @covers \onOffice\Api\Client\Gui\Config
 */

class ConfigTest extends TestCase
{
    public function testGetApiUrl(): void
    {
        $pConfig = new Config();
        $this->assertIsString($pConfig->getApiUrl());
        $this->assertStringStartsWith('https://api.onoffice.de/api', $pConfig->getApiUrl());
    }
}
