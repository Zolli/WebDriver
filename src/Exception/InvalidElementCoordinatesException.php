<?php

namespace Zolli\WebDriver\Exception;

/**
 * InvalidElementCoordinatesException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
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
