<?php

namespace Zolli\WebDriver\Exception;

/**
 * ElementIsNotSelectableException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class ElementIsNotSelectableException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 15;
    }

}
