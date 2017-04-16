<?php

namespace Zolli\WebDriver\Http\Command;

use Zolli\WebDriver\Exception\MissingUrlMappingException;
use Zolli\WebDriver\Http\Command\HttpCommand;

/**
 * Common interface for various command factories
 *
 * @package Zolli\WebDriver
 * @subpackage Http\Command
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
interface HttpCommandFactoryInterface
{

    /**
     * Adds new default arguments. The provided array must be associative and
     * the keys needs to be the name of the argument and the value is the corresponding argument value
     *
     * @param array $defaultArguments
     *
     * @return HttpCommandFactoryInterface
     */
    public function setDefaultArguments(array $defaultArguments = []): HttpCommandFactoryInterface;

    /**
     * Add a new single argument to the argument array
     *
     * @param string $argumentName
     * @param mixed $value
     *
     * @return HttpCommandFactoryInterface
     */
    public function setDefaultArgument(string $argumentName, $value): HttpCommandFactoryInterface;

    /**
     * Creates a new command representing class that actually used by executors to
     * make HTTP calls
     *
     * @param string $forCommand The command name. Use Commands class
     * @param array $parameters
     * @param array $arguments
     *
     * @return \Zolli\WebDriver\Http\Command\HttpCommand
     */
    public function createCommand(string $forCommand, array $parameters = [], array $arguments = []): HttpCommand;

}