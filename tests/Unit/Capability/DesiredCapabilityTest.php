<?php

namespace Zolli\WebDriver\Tests\Unit\Capability;

use PHPUnit\Framework\TestCase;
use Zolli\WebDriver\Capability\Browser;
use Zolli\WebDriver\Capability\Capabilities;
use Zolli\WebDriver\Capability\DesiredCapability;
use Zolli\WebDriver\Capability\Platform;
use Zolli\WebDriver\Exception\InvalidArgumentException;

class DesiredCapabilityTest extends TestCase
{
    public function testItSerializeToJsonProperlyWhenEmpty()
    {
        $desiredCapability = new DesiredCapability();
        $this->assertEquals(json_encode([]), $desiredCapability->toJson());
    }

    public function testFailsSerializationsWithMalformedData()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Malformed UTF-8 characters, possibly incorrectly encoded');

        $desiredCapability = new DesiredCapability();
        $desiredCapability->add('test', "\xB1\x31");
        $desiredCapability->toJson();
    }

    public function testItReturnsAddedCapabilitiesCorrectly()
    {
        $desiredCapability = new DesiredCapability([
            Capabilities::SELENIUM_BROWSER_NAME => Browser::CHROME,
            Capabilities::SELENIUM_BROWSER_VERSION => '',
            Capabilities::SELENIUM_PLATFORM => Platform::WINDOWS,
        ]);

        $this->assertTrue($desiredCapability->has(Capabilities::SELENIUM_PLATFORM));
        $this->assertFalse($desiredCapability->has(Capabilities::APPLICATION_CACHE_ENABLED));
    }

    public function testAddWorksAndReturnsSelf()
    {
        $desiredCapability = new DesiredCapability();
        $returned = $desiredCapability->add(Capabilities::SELENIUM_BROWSER_NAME, Browser::CHROME);

        $this->assertSame($desiredCapability, $returned);
        $this->assertTrue($desiredCapability->has(Capabilities::SELENIUM_BROWSER_NAME));
    }

    public function testIsCastToArrayProperly()
    {
        $desiredCapability = new DesiredCapability();
        $desiredCapability->add(Capabilities::SELENIUM_PLATFORM, Platform::ANY);

        $expected = ['platform' => 'ANY'];
        $this->assertEquals($expected, $desiredCapability->toArray());

    }

}