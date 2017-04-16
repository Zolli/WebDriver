<?php

namespace Zolli\WebDriver\Remote;

use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface;
use Zolli\WebDriver\Http\HttpCommandExecutorInterface;

/**
 * Represent a remote session
 *
 * @package Zolli\WebDriver
 * @subpackage Remote
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
class RemoteSession
{

    /**
     * @var string
     */
    protected $sessionId;

    /**
     * @var HttpCommandExecutorInterface
     */
    protected $executor;

    /**
     * @var HttpCommandFactoryInterface
     */
    protected $commandFactory;

    public function __construct(
        string $sessionId,
        HttpCommandExecutorInterface $executor,
        HttpCommandFactoryInterface $commandFactory
    )
    {
        $this->sessionId = $sessionId;
        $this->executor = $executor;
        $this->commandFactory = $commandFactory;
    }

    /*
    public function findElement()
    {
        $command = $this->commandFactory->createCommand(Commands::SEARCH_ELEMENT_FROM_ROOT);
    }
    */

}
