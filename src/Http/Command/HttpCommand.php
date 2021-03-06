<?php

namespace Zolli\WebDriver\Http\Command;

use Zolli\WebDriver\Exception\MissingUrlArgumentException;

/**
 * Represent a command that sent to the server
 *
 * @package Zolli\WebDriver
 * @subpackage Http\Command
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
class HttpCommand
{

    /**
     * @var array
     */
    private $arguments;

    /**
     * @var string
     */
    private $rawSuffix;

    /**
     * @var string
     */
    private $method;

    /**
     * @var array
     */
    private $parameters;

    /**
     * HttpCommand constructor
     *
     * @param array $methodDetails
     * @param array $arguments
     * @param array $parameters
     */
    public function __construct(array $methodDetails, array $arguments = [], array $parameters = [])
    {
        $this->arguments = $arguments;
        $this->rawSuffix = $methodDetails['url'];
        $this->method = $methodDetails['method'];
        $this->parameters = $parameters;
    }

    /**
     * Returns the parameters contains by the request body
     *
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Get on parameter from the request body by name
     * The returned parameter always casted to string
     *
     * @param string $parameterName
     *
     * @return string|null
     *
     */
    public function getParameter(string $parameterName): ?string
    {
        if (!array_key_exists($parameterName, $this->parameters)) {
            return null;
        }

        return (string) $this->parameters[$parameterName];
    }

    /**
     * Returns the HTTP method used by this command
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Returns the raw URL suffix
     *
     * @return string
     */
    public function getRawSuffix(): string
    {
        return $this->rawSuffix;
    }

    /**
     * Returns the whole array of added argument to this command. This arguments used to preapare the url suffix
     * used by various command executors
     *
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * Returns an argument from the command if is specified
     *
     * @param string $name The argument name
     *
     * @return string|null
     */
    public function getArgument(string $name): ?string
    {
        if (!array_key_exists($name, $this->arguments)) {
            return null;
        }

        return (string) $this->arguments[$name];
    }

    /**
     * Returns the prepared URL suffix
     *
     * @return string
     *
     * @throws MissingUrlArgumentException
     */
    public function getSuffixWithArguments(): string
    {
        preg_match_all('/\:(\w+)/', $this->rawSuffix, $matches);
        $matchedArguments = $matches[1];
        $returnedSuffix = $this->rawSuffix;

        foreach ($matchedArguments as $urlArgument) {
            if (!array_key_exists($urlArgument, $this->arguments)) {
                // TODO: Exception
                throw new MissingUrlArgumentException(
                    sprintf(
                        'The %s url argument is missing while preparing the following url: %s',
                        $urlArgument,
                        $this->rawSuffix
                    )
                );
            }

            $returnedSuffix = str_replace(':' . $urlArgument, $this->arguments[$urlArgument], $returnedSuffix);
        }

        return $returnedSuffix;
    }

}