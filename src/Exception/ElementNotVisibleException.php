<?php

namespace Zolli\WebDriver\Exception;

/**
 * ElementNotVisibleException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class ElementNotVisibleException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 11;
    }

}
