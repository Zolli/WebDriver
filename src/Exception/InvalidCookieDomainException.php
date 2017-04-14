<?php

namespace Zolli\WebDriver\Exception;

/**
 * InvalidCookieDomainException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class InvalidCookieDomainException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 24;
    }

}
