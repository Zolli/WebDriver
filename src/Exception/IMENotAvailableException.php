<?php

namespace Zolli\WebDriver\Exception;

/**
 * IMENotAvailableException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class IMENotAvailableException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 30;
    }

}
