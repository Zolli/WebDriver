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
     * Navigates forward in browser history. If has any.
     */
    public function navigateForward()
    {
        $command = $this->commandFactory->createCommand(Commands::NAVIGATE_FORWARD);
        $this->executor->execute($command);
    }

    /**
     * Navigates backward in browser history. If has any.
     */
    public function navigateBackward()
    {
        $command = $this->commandFactory->createCommand(Commands::NAVIGATE_BACK);
        $this->executor->execute($command);
    }

    /**
     * Refreshes the current page
     */
    public function refresh()
    {
        $command = $this->commandFactory->createCommand(Commands::NAVIGATE_REFRESH);
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
     * Destroy the currently opened session. Destroying the session also close all open window that
     * opened in this session
     */
    public function destroy()
    {
        $command = $this->commandFactory->createCommand(Commands::DELETE_SESSION_BY_ID);
        $this->executor->execute($command);
    }

    /**
     * Takes a screenshot form the current window. The screenshot is strictly PNG.
     *
     * @param string $file The file where the screenshot is written. MUst contains the PNG extension
     */
    public function takeScreenshot(string $file)
    {
        $command = $this->commandFactory->createCommand(Commands::TAKE_SCREENSHOT);
        $response = $this->executor->execute($command);
        $content = $response['value'];

        file_put_contents($file, base64_decode($content));
    }

    /**
     * Returns the current URL in browser
     *
     * @return string
     */
    public function getCurrentUrl(): string
    {
        $command = $this->commandFactory->createCommand(Commands::GET_SESSION_URL);
        $response = $this->executor->execute($command);

        return isset($response['value']) ? $response['value'] : '';
    }

    /**
     * Returns an object that represent the current browser window
     *
     * @return RemoteWindow
     */
    public function getWindow(): RemoteWindow
    {
        $command = $this->commandFactory->createCommand(Commands::GET_WINDOW_HANDLE);
        $response = $this->executor->execute($command);
        $windowHandle = $response['value'];
        $cloneCommandFactory = clone $this->commandFactory;
        $cloneCommandFactory->setDefaultArgument('windowHandle', $windowHandle);

        return new RemoteWindow($this->executor, $cloneCommandFactory);
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













    public function test()
    {
        $command = $this->commandFactory->createCommand(Commands::GET_ALL_IME_ENGINES, [], []);
        $response = $this->executor->execute($command);
        var_dump($response);
    }

}
