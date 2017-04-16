<?php

namespace Zolli\WebDriver\Exception;

/**
 * ElementNotVisibleException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
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
