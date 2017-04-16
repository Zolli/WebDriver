<?php

namespace Zolli\WebDriver\Remote;

use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface;
use Zolli\WebDriver\Http\HttpCommandExecutorInterface;
use Zolli\WebDriver\Selector\Strategy\SelectorStrategyInterface;

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

    public function navigateTo($url)
    {
        $command = $this->commandFactory->createCommand(Commands::NAVIGATE_TO_URL, [
            'url' => $url,
        ]);

        $response = $this->executor->execute($command);
    }

    public function findElement(SelectorStrategyInterface $selector)
    {
        $command = $this->commandFactory->createCommand(Commands::SEARCH_ELEMENT_FROM_ROOT, [
            'using' => $selector->getStrategyName(),
            'value' => $selector->getSelector(),
        ]);

        $response = $this->executor->execute($command);
        return $response['value']['ELEMENT'];
    }

    public function findElements(SelectorStrategyInterface $selector)
    {
        $command = $this->commandFactory->createCommand(Commands::SEARCH_ELEMENTS_FROM_ROOT, [
            'using' => $selector->getStrategyName(),
            'value' => $selector->getSelector(),
        ]);

        $response = $this->executor->execute($command);
        var_dump($response);
    }

    public function setTimeouts($inMs)
    {
        $commandImplicit = $this->commandFactory->createCommand(Commands::SET_SESSION_TIMEOUTS, [
            'type' => 'implicit',
            'ms' => $inMs,
        ]);

        $commandScript = $this->commandFactory->createCommand(Commands::SET_SESSION_TIMEOUTS, [
            'type' => 'script',
            'ms' => $inMs,
        ]);

        $commandPageLoad = $this->commandFactory->createCommand(Commands::SET_SESSION_TIMEOUTS, [
            'type' => 'page load',
            'ms' => $inMs,
        ]);

        $this->executor->execute($commandImplicit);
        $this->executor->execute($commandScript);
        $this->executor->execute($commandPageLoad);
    }

    public function getTextFromElement($id)
    {
        $command = $this->commandFactory->createCommand(Commands::GET_TEXT_FROM_ELEMENT, [], [
            'id' => $id,
        ]);

        $response = $this->executor->execute($command, true);
        var_dump($response);
    }

}
