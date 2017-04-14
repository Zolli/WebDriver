<?php

namespace Zolli\WebDriver\Exception;

/**
 * InvalidSelectorException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class InvalidSelectorException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 32;
    }

}
