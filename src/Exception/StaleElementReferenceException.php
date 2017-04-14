<?php

namespace Zolli\WebDriver\Exception;

/**
 * StaleElementReferenceException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class StaleElementReferenceException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 10;
    }

}
