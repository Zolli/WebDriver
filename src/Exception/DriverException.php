<?php

namespace Zolli\WebDriver\Exception;

use \Exception;
use \Throwable;

/**
 * Abstract class for driver exceptions
 *
 * @package Zolli\WebDriver
 * @subpackage Exception
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
abstract class DriverException extends Exception
{

    /**
     * @inheritdoc
     *
     * @codeCoverageIgnore
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $this->getDriverErrorCode(), $previous);
    }

    public static function createByStatus(string $status, string $message = null): Exception
    {
        switch ($status) {
            case 6:
                return new NoSuchDriverException($message, $status);
                break;
            case 7:
                return new NoSuchElementException($message, $status);
                break;
            case 8:
                return new NoSuchFrameException($message, $status);
                break;
            case 9:
                return new UnknownCommandException($message, $status);
                break;
            case 10:
                return new StaleElementReferenceException($message, $status);
                break;
            case 11:
                return new ElementNotVisibleException($message, $status);
                break;
            case 12:
                return new InvalidElementStateException($message, $status);
                break;
            case 13:
                return new UnknownErrorException($message, $status);
                break;
            case 15:
                return new ElementIsNotSelectableException($message, $status);
                break;
            case 17:
                return new JavaScriptErrorException($message, $status);
                break;
            case 19:
                return new XPathLookupErrorException($message, $status);
                break;
            case 21:
                return new TimeoutException($message, $status);
                break;
            case 23:
                return new NoSuchWindowException($message, $status);
                break;
            case 24:
                return new InvalidCookieDomainException($message, $status);
                break;
            case 25:
                return new UnableToSetCookieException($message, $status);
                break;
            case 26:
                return new UnexpectedAlertOpenException($message, $status);
                break;
            case 27:
                return new NoAlertOpenErrorException($message, $status);
                break;
            case 28:
                return new ScriptTimeoutException($message, $status);
                break;
            case 29:
                return new InvalidElementCoordinatesException($message, $status);
                break;
            case 30:
                return new IMENotAvailableException($message, $status);
                break;
            case 31:
                return new IMEEngineActivationFailedException($message, $status);
                break;
            case 32:
                return new InvalidSelectorException($message, $status);
                break;
            case 33:
                return new SessionNotCreatedException($message, $status);
                break;
            case 34:
                return new MoveTargetOutOfBoundsException($message, $status);
                break;
            default:
                return new \Exception(sprintf('Invalid error code! Status: %s Message: %s', $status, $message), $status);
        }
    }

    /**
     * Returns the error code that represent the WebDriver error code
     *
     * @return int
     */
    public abstract function getDriverErrorCode(): int;

}
