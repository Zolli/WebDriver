<?php

namespace Zolli\WebDriver\Exception;

/**
 * UnexpectedAlertOpenException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class UnexpectedAlertOpenException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 26;
    }

}
