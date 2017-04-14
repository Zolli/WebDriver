<?php

namespace Zolli\WebDriver\Exception;

/**
 * UnknownCommandException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class UnknownCommandException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 9;
    }

}
