<?php

namespace Zolli\WebDriver\Exception;

/**
 * NoSuchDriverException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class NoSuchDriverException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 6;
    }

}
