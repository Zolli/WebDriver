<?php

namespace Zolli\WebDriver\Exception;

/**
 * IMEEngineActivationFailedException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class IMEEngineActivationFailedException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 31;
    }

}
