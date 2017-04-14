<?php

namespace Zolli\WebDriver\Exception;

/**
 * XPathLookupErrorException
 *
 * @package Zolli\WebDriver\Exception
 * @subpackage Exception
 */
class XPathLookupErrorException extends DriverException
{

    /**
     * @inheritdoc
     */
    public function getDriverErrorCode(): int
    {
        return 19;
    }

}
