<?php

namespace Zolli\WebDriver\Exception;

/**
 * ScriptTimeoutException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 *
 * @codeCoverageIgnore
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
