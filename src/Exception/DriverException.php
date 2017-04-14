<?php

namespace Zolli\WebDriver\Exception;

use \Exception;
use \Throwable;

/**
 * Abstract class for driver exceptions
 *
 * @package Zolli\WebDriver
 * @subpackage Exception
 */
abstract class DriverException extends Exception
{

    /**
     * @inheritdoc
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Returns the error code that represent the WebDriver error code
     *
     * @return int
     */
    public abstract function getDriverErrorCode(): int;

}
