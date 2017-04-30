<?php

namespace Zolli\WebDriver\Remote;

use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Exception\InvalidModifierKeyException;
use Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface;
use Zolli\WebDriver\Http\HttpCommandExecutorInterface;

/**
 * This class represent a keyboard and handles modifier keys
 *
 * @package Zolli\WebDriver
 * @subpackage Remote
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
class RemoteKeyboard
{

    /**
     * @var \Zolli\WebDriver\Http\HttpCommandExecutorInterface
     */
    private $executor;

    /**
     * @var \Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface
     */
    private $commandFactory;

    /**
     * @var array
     */
    protected $modifierKeys = [
        "SHIFT" => "\xEE\x80\x88", // Shift
        "LEFT_SHIFT" => "\xEE\x80\x88", // Left Shift
        "CONTROL" => "\xEE\x80\x89", // Control
        "LEFT_CONTROL" => "\xEE\x80\x89", // Left Control
        "ALT" => "\xEE\x80\x8A", // Alt
        "LEFT_ALT" => "\xEE\x80\x8A", // Left Alt
    ];

    protected $activeModifiers = [];

    /**
     * RemoteKeyboard constructor.
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
        $this->elementId = $elementId;
    }

    /**
     * Send the given key sequence to the browser
     *
     * @param string $keySequence
     */
    public function sendKeys(string $keySequence): void
    {
        $command = $this->commandFactory->createCommand(Commands::SEND_KEY_STROKES_TO_ACTIVE_ELEMENT, [
            'value' => [(string) $keySequence],
        ]);

        $this->executor->execute($command);
    }

    /**
     * Press a modifier key. If the key pressed before and not released this function does't
     * perform any call to the server.
     *
     * @param string $key
     *
     * @throws InvalidModifierKeyException
     */
    public function pressModifier(string $key): void
    {
        if (!$this->isModifier($key)) {
            throw new InvalidModifierKeyException(sprintf('The %s key is not a modifier key!', $key));
        }

        if (in_array($key, $this->activeModifiers)) {
            return;
        }

        $command = $this->commandFactory->createCommand(Commands::SEND_KEY_STROKES_TO_ACTIVE_ELEMENT, [
            'value' => [(string) $key],
        ]);

        $this->executor->execute($command);

        $this->activeModifiers[] = $key;
    }

    /**
     * Releases an already pressed modifier key
     *
     * @param string $key
     *
     * @throws InvalidModifierKeyException
     */
    public function releaseModifier(string $key): void
    {
        if (!$this->isModifier($key)) {
            throw new InvalidModifierKeyException(sprintf('The %s key is not a modifier key!', $key));
        }

        if (!in_array($key, $this->activeModifiers)) {
            throw new InvalidModifierKeyException(sprintf('The %s modifier key is not pressed!', $key));
        }

        $command = $this->commandFactory->createCommand(Commands::SEND_KEY_STROKES_TO_ACTIVE_ELEMENT, [
            'value' => [(string) $key],
        ]);

        $this->executor->execute($command);

        $arrayKey = array_search($key, $this->activeModifiers);
        unset($this->modifierKeys[$arrayKey]);
    }

    /**
     * Determines that the given key is a modifier key or not
     *
     * @param string $key
     *
     * @return bool
     */
    protected function isModifier(string $key): bool
    {
        return in_array($key, $this->modifierKeys);
    }

}