<?php

namespace Zolli\WebDriver\Http\Command;

use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Exception\MissingUrlMappingException;
use Zolli\WebDriver\Http\Command\HttpCommand;

/**
 * This class used to create command classes that sent through the transport
 *
 * @package Zolli\WebDriver
 * @subpackage Http\Command
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
class HttpCommandFactory extends AbstractCommandFactory
{

    /**
     * This array contains the full mapping of commands to actual
     * URL and HTTP method
     *
     * @var array
     */
    protected $mapping = [
        Commands::QUERY_STATUS => [
            'method' => 'GET',
            'url' => '/status',
        ],
        Commands::CREATE_SESSION => [
            'method' => 'POST',
            'url' => '/session',
        ],
        Commands::SEARCH_ELEMENT_FROM_ROOT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/element',
        ],
    ];

    /**
     * @inheritdoc
     */
    public function createCommand(string $forCommand, array $additionalParameters = []): HttpCommand
    {
        if (!array_key_exists($forCommand, $this->mapping)) {
            throw new MissingUrlMappingException(
                sprintf('The %s command not mapped by this class!', $forCommand)
            );
        }

        $commandDetails = $this->mapping[$forCommand];
        $parameters = array_merge($additionalParameters, $this->arguments);

        return new HttpCommand($commandDetails, $parameters);
    }

}
