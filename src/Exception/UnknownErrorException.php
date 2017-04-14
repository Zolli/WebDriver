<?php

namespace Zolli\WebDriver\Exception;

/**
 * UnknownErrorException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class UnknownErrorException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 13;
    }

}
