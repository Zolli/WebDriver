<?php

namespace Zolli\WebDriver\Exception;

/**
 * UnableToSetCookieException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class UnableToSetCookieException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 25;
    }

}
