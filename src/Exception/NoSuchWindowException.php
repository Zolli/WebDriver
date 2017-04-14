<?php

namespace Zolli\WebDriver\Exception;

/**
 * NoSuchWindowException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class NoSuchWindowException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 23;
    }

}
