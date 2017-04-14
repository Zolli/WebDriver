<?php

namespace Zolli\WebDriver\Exception;

/**
 * TimeoutException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class TimeoutException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 21;
    }

}
