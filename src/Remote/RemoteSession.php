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

    /**
     * Navigate the browser to a given url
     *
     * @param string $url
     */
    public function navigateTo(string $url)
    {
        $command = $this->commandFactory->createCommand(Commands::NAVIGATE_TO_URL, [
            'url' => $url,
        ]);

        $this->executor->execute($command);
    }

    /**
     * Set the timeout that selenium needs to wait if the page is not loading
     *
     * @param int $timeoutInMilliseconds
     *
     * @return RemoteSession
     */
    public function setPageLoadTimeout(int $timeoutInMilliseconds): RemoteSession
    {
        $command = $this->commandFactory->createCommand(Commands::SET_SESSION_TIMEOUTS, [
            'type' => 'page load',
            'ms' => $timeoutInMilliseconds,
        ]);

        $this->executor->execute($command);

        return $this;
    }

    /**
     * Timeout for all general command
     *
     * @param int $timeoutInMilliseconds
     *
     * @return RemoteSession
     */
    public function setImplicitWait(int $timeoutInMilliseconds): RemoteSession
    {
        $command = $this->commandFactory->createCommand(Commands::SET_SESSION_TIMEOUT_IMPLICIT_WAIT, [
            'ms' => $timeoutInMilliseconds,
        ]);

        $this->executor->execute($command);

        return $this;
    }


    /**
     * Timeout for asynchronous script execution
     *
     * @param int $timeoutInMilliseconds
     *
     * @return RemoteSession
     */
    public function setAsyncScriptTimeout(int $timeoutInMilliseconds): RemoteSession
    {
        $command = $this->commandFactory->createCommand(Commands::SET_SESSION_TIMEOUT_ASYNC_SCRIPT, [
            'ms' => $timeoutInMilliseconds,
        ]);

        $this->executor->execute($command);

        return $this;
    }

    /**
     * Timeout for general Javascript execution
     *
     * @param int $timeoutInMilliseconds
     *
     * @return RemoteSession
     */
    public function setScriptTimeout(int $timeoutInMilliseconds): RemoteSession
    {
        $command = $this->commandFactory->createCommand(Commands::SET_SESSION_TIMEOUTS, [
            'type' => 'script',
            'ms' => $timeoutInMilliseconds,
        ]);

        $this->executor->execute($command);

        return $this;
    }

    /**
     * Finds on element on the page by given selector. If the selector matches more than
     * one element only the first matched element will be returned
     *
     * @param SelectorStrategyInterface $selector
     *
     * @return int
     */
    public function findElement(SelectorStrategyInterface $selector)
    {
        $command = $this->commandFactory->createCommand(Commands::SEARCH_ELEMENT_FROM_ROOT, [
            'using' => $selector->getStrategyName(),
            'value' => $selector->getSelector(),
        ]);

        $response = $this->executor->execute($command);
        $elementId = (int) $response['value']['ELEMENT'];
        return $elementId;
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

}
