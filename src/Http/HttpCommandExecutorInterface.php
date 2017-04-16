<?php

namespace Zolli\WebDriver\Http;

use GuzzleHttp\Exception\ServerException;
use Zolli\WebDriver\Exception\InvalidArgumentException;
use Zolli\WebDriver\Http\Command\HttpCommand;

/**
 * Common interface used by HTTP executors
 *
 * @package Zolli\WebDriver
 * @subpackage Http
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
interface HttpCommandExecutorInterface
{

    /**
     * Executes the HTTP command and send to the server. When execution is done
     * the response returned as associative array or if yu want returned as raw string
     *
     * @param HttpCommand $command The command to be executed
     * @param bool $asRaw If its true returns the raw response body
     *
     * @return string|array
     *
     * @throws ServerException
     * @throws InvalidArgumentException
     */
    public function execute(HttpCommand $command, bool $asRaw = false);

}