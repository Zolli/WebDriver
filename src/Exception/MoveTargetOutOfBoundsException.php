<?php

namespace Zolli\WebDriver\Exception;

/**
 * MoveTargetOutOfBoundsException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class MoveTargetOutOfBoundsException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 34;
    }

}
