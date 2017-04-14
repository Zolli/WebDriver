<?php

namespace Zolli\WebDriver\Exception;

/**
 * JavaScriptErrorException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class JavaScriptErrorException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 17;
    }

}
