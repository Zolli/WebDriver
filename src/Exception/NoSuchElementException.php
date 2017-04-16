<?php

namespace Zolli\WebDriver\Exception;

/**
 * NoSuchElementException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
class NoSuchElementException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 7;
    }

}
