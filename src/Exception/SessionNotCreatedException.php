<?php

namespace Zolli\WebDriver\Exception;

/**
 * SessionNotCreatedException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class SessionNotCreatedException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 33;
    }

}
