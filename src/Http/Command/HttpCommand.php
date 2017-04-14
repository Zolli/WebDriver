<?php

namespace Zolli\WebDriver\Http\Command;

class HttpCommand
{

    private $parameters;

    private $rawSuffix;

    private $method;

    public function __construct(array $methodDetails, array $parameters = [])
    {
        $this->parameters = $parameters;
        $this->rawSuffix = $methodDetails['url'];
        $this->method = $methodDetails['method'];
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getRawSuffix()
    {
        return $this->rawSuffix;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getParameter(string $name)
    {
        if (!array_key_exists($name, $this->parameters)) {
            return null;
        }

        return $this->parameters[$name];
    }

    public function getSuffixWithParameters()
    {
        return $this->rawSuffix;
    }

}