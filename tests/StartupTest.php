<?php

use PHPUnit\Framework\TestCase;
use RenduOpenSource\Startup\Startup;

class StartupTest extends TestCase
{
    public function testgetStartups()
    {
        $startup = new Startup();
        $this->assertIsArray($startup->getStartups());
    }
}