<?php

namespace Zolli\WebDriver\Http\Command;

use Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface;

/**
 * Abstract class for command factories
 *
 * @package Zolli\WebDriver
 * @subpackage Http\Command
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
abstract class AbstractCommandFactory implements HttpCommandFactoryInterface
{

    /**
     * @var array
     */
    protected $arguments = [];

    /**
     * @inheritdoc
     */
    public function setDefaultArguments(array $defaultArguments = []): HttpCommandFactoryInterface
    {
        $this->arguments = array_merge($defaultArguments, $this->arguments);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setDefaultArgument(string $argumentName, $value): HttpCommandFactoryInterface
    {
        $this->arguments[$argumentName] = $value;

        return $this;
    }

}
