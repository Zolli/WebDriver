<?php

namespace Zolli\WebDriver\Exception;

/**
 * InvalidElementCoordinatesException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 *
 * @codeCoverageIgnore
 */
class InvalidElementCoordinatesException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 29;
    }

}
