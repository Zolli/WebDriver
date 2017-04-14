<?php

namespace Zolli\WebDriver\Exception;

/**
 * NoSuchFrameException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class NoSuchFrameException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 8;
    }

}
