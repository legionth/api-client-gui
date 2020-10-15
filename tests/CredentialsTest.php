<?php

use PHPUnit\Framework\TestCase;
use onOffice\Api\Client\Gui\dataObjects\Credentials;

/**
 * @covers \onOffice\Api\Client\Gui\dataObjects\Credentials
 */

class CredentialsTest extends TestCase
{
    public function testCredentials(): void
    {
        $credentials = new Credentials('testToken', 'testSecret');

        $this->assertEquals('testToken', $credentials->getToken());
        $this->assertEquals('testSecret', $credentials->getSecret());
    }
}
