<?php

namespace Zolli\WebDriver\Remote;

use Zolli\WebDriver\Capability\DesiredCapability;
use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface;
use Zolli\WebDriver\Http\HttpCommandExecutorInterface;

/**
 * The driver is a class that used to create sessions. A session represent a browser
 * windows on the selenium end, and the session is used to control the browser.
 *
 * @package Zolli\WebDriver
 * @subpackage Remote
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
class RemoteDriver
{
    /**
     * @var HttpCommandExecutorInterface
     */
    protected $executor;

    /**
     * @var HttpCommandFactoryInterface
     */
    protected $commandFactory;

    /**
     * RemoteDriver constructor
     *
     * @param HttpCommandExecutorInterface $executor
     * @param HttpCommandFactoryInterface $commandFactory
     */
    public function __construct(
        HttpCommandExecutorInterface $executor,
        HttpCommandFactoryInterface $commandFactory
    )
    {
        $this->executor = $executor;
        $this->commandFactory = $commandFactory;
    }

    /**
     * Creates a session by desired capabilities. The session receives the injected command factory
     * The command factory is cloned and injected to the session. The cloned command factory also receives
     * the sessionId as default parameter.
     *
     * @param DesiredCapability $capabilities
     *
     * @return RemoteSession
     */
    public function createSession(DesiredCapability $capabilities): RemoteSession
    {
        $parameters = [
            'desiredCapabilities' => $capabilities->toArray(),
        ];

        $command = $this->commandFactory->createCommand(Commands::CREATE_SESSION, $parameters);
        $response = $this->executor->execute($command);
        $cloneCommandFactory = clone $this->commandFactory;
        $cloneCommandFactory->setDefaultArgument('sessionId', $response['sessionId']);

        return new RemoteSession($response['sessionId'], $this->executor, $cloneCommandFactory);
    }

}