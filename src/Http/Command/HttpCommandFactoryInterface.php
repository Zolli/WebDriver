<?php

namespace Zolli\WebDriver\Http\Command;

use Zolli\WebDriver\Http\Command\HttpCommand;

interface HttpCommandFactoryInterface
{

    public function setDefaultParameters(array $defaultParameters = []): HttpCommandFactoryInterface;

    public function setDefaultParameter(string $parameterName, $value): HttpCommandFactoryInterface;

    public function get(string $forCommand, array $additionalParameters = []): HttpCommand;

}