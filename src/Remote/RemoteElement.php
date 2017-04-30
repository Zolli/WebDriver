<?php

namespace Zolli\WebDriver\Remote;

use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface;
use Zolli\WebDriver\Http\HttpCommandExecutorInterface;

class RemoteElement
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
     * @var int
     */
    protected $elementId;

    /**
     * RemoteElement constructor.
     *
     * @param HttpCommandExecutorInterface $executor
     * @param HttpCommandFactoryInterface $commandFactory
     * @param int $elementId
     */
    public function __construct(
        HttpCommandExecutorInterface $executor,
        HttpCommandFactoryInterface $commandFactory,
        int $elementId
    )
    {
        $this->executor = $executor;
        $this->commandFactory = $commandFactory;
        $this->elementId = $elementId;
    }

    /**
     * Activate the element (Brings to focus) by clicking on it
     */
    public function click(): void
    {
        $command = $this->commandFactory->createCommand(Commands::CLICK_ON_ELEMENT, [], ['id' => $this->elementId]);
        $this->executor->execute($command);
    }

    /**
     * If the element is a form submits it.
     */
    public function submit(): void
    {
        $command = $this->commandFactory->createCommand(Commands::SUBMIT_FORM_ELEMENT, [], ['id' => $this->elementId]);
        $this->executor->execute($command);
    }

    /**
     * Returns the text contains by the element
     *
     * @return string
     */
    public function getText(): string
    {
        $command = $this->commandFactory->createCommand(
            Commands::GET_TEXT_FROM_ELEMENT,
            [],
            [
                'id' => $this->elementId
            ]
        );

        $this->executor->execute($command);
    }

    /**
     * Returns the keyboard. Note: If you want to type to the current element, you need to
     * activate it before, by clicking on it.
     *
     * @return \Zolli\WebDriver\Remote\RemoteKeyboard
     */
    public function getKeyboard(): RemoteKeyboard
    {
        return new RemoteKeyboard($this->executor, $this->commandFactory);
    }

}