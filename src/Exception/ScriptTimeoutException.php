<?php

namespace Zolli\WebDriver\Exception;

/**
 * ScriptTimeoutException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class ScriptTimeoutException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 28;
    }

}
