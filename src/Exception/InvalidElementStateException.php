<?php

namespace Zolli\WebDriver\Exception;

/**
 * InvalidElementStateException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class InvalidElementStateException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 12;
    }

}
