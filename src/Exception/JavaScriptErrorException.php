<?php

namespace Zolli\WebDriver\Exception;

/**
 * JavaScriptErrorException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
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
