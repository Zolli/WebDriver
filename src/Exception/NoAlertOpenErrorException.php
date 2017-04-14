<?php

namespace Zolli\WebDriver\Exception;

/**
 * NoAlertOpenErrorException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class NoAlertOpenErrorException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 27;
    }

}
