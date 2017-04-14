<?php

namespace Zolli\WebDriver\Exception;

/**
 * NoSuchElementException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class NoSuchElementException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 7;
    }

}
