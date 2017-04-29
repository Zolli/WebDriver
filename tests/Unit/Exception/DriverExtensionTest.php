<?php

namespace Zolli\WebDriver\Tests\Unit\Exception;

use PHPUnit\Framework\TestCase;
use Zolli\WebDriver\Exception\DriverException;
use Zolli\WebDriver\Exception\ElementIsNotSelectableException;
use Zolli\WebDriver\Exception\ElementNotVisibleException;
use Zolli\WebDriver\Exception\IMEEngineActivationFailedException;
use Zolli\WebDriver\Exception\IMENotAvailableException;
use Zolli\WebDriver\Exception\InvalidCookieDomainException;
use Zolli\WebDriver\Exception\InvalidElementCoordinatesException;
use Zolli\WebDriver\Exception\InvalidElementStateException;
use Zolli\WebDriver\Exception\InvalidSelectorException;
use Zolli\WebDriver\Exception\JavaScriptErrorException;
use Zolli\WebDriver\Exception\MoveTargetOutOfBoundsException;
use Zolli\WebDriver\Exception\NoAlertOpenErrorException;
use Zolli\WebDriver\Exception\NoSuchDriverException;
use Zolli\WebDriver\Exception\NoSuchElementException;
use Zolli\WebDriver\Exception\NoSuchFrameException;
use Zolli\WebDriver\Exception\NoSuchWindowException;
use Zolli\WebDriver\Exception\ScriptTimeoutException;
use Zolli\WebDriver\Exception\SessionNotCreatedException;
use Zolli\WebDriver\Exception\StaleElementReferenceException;
use Zolli\WebDriver\Exception\TimeoutException;
use Zolli\WebDriver\Exception\UnableToSetCookieException;
use Zolli\WebDriver\Exception\UnexpectedAlertOpenException;
use Zolli\WebDriver\Exception\UnknownCommandException;
use Zolli\WebDriver\Exception\UnknownErrorException;
use Zolli\WebDriver\Exception\XPathLookupErrorException;

class DriverExtensionTest extends TestCase
{

    public function exceptionsByErrorCodeDataProvider()
    {
        return [
            [6, NoSuchDriverException::class],
            [7, NoSuchElementException::class],
            [8, NoSuchFrameException::class],
            [9, UnknownCommandException::class],
            [10, StaleElementReferenceException::class],
            [11, ElementNotVisibleException::class],
            [12, InvalidElementStateException::class],
            [13, UnknownErrorException::class],
            [15, ElementIsNotSelectableException::class],
            [17, JavaScriptErrorException::class],
            [19, XPathLookupErrorException::class],
            [21, TimeoutException::class],
            [23, NoSuchWindowException::class],
            [24, InvalidCookieDomainException::class],
            [25, UnableToSetCookieException::class],
            [26, UnexpectedAlertOpenException::class],
            [27, NoAlertOpenErrorException::class],
            [28, ScriptTimeoutException::class],
            [29, InvalidElementCoordinatesException::class],
            [30, IMENotAvailableException::class],
            [31, IMEEngineActivationFailedException::class],
            [32, InvalidSelectorException::class],
            [33, SessionNotCreatedException::class],
            [34, MoveTargetOutOfBoundsException::class],
        ];
    }

    /**
     * @dataProvider exceptionsByErrorCodeDataProvider
     */
    public function testItCreatesTheProperExceptionByStatusCode($statusCode, $expectedExceptionClass)
    {
        $actualException = DriverException::createByStatus($statusCode, 'Test');

        $this->assertInstanceOf($expectedExceptionClass, $actualException);
    }

    public function testItReturnsAValidExceptionWhenInvalidStatusGiven()
    {
        $actualException = DriverException::createByStatus(99, 'Test message');

        $this->assertInstanceOf(\Exception::class, $actualException);
        $this->assertEquals(99, $actualException->getCode());
        $this->assertEquals('Invalid error code! Status: 99 Message: Test message', $actualException->getMessage());
    }

}