<?php

namespace Zolli\WebDriver\Http\Command;

use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Exception\MissingUrlMappingException;
use Zolli\WebDriver\Http\Command\HttpCommand;
use Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface;

class HttpCommandFactory implements HttpCommandFactoryInterface
{

    /**
     * @var array
     */
    protected $parameters = [];

    protected $mapping = [
        Commands::QUERY_STATUS => [
            'method' => 'GET',
            'url' => '/status',
        ],
        Commands::CREATE_SESSION
    ];

    public function setDefaultParameters(array $defaultParameters = []): HttpCommandFactoryInterface
    {
        $this->parameters = $defaultParameters;

        return $this;
    }

    /**
     * @param string $parameterName
     * @param $value
     *
     * @return HttpCommandFactoryInterface
     */
    public function setDefaultParameter(string $parameterName, $value): HttpCommandFactoryInterface
    {
        $this->parameters[$parameterName] = $value;

        return $this;
    }

    /**
     * @param string $forCommand
     * @param array $additionalParameters
     *
     * @return HttpCommand
     *
     * @throws MissingUrlMappingException
     */
    public function get(string $forCommand, array $additionalParameters = []): HttpCommand
    {
        if (!array_key_exists($forCommand, $this->mapping)) {
            // TODO: Message
            throw new MissingUrlMappingException();
        }

        $commandDetails = $this->mapping[$forCommand];
        $parameters = array_merge($additionalParameters, $this->parameters);

        return new HttpCommand($commandDetails, $parameters);
    }

}