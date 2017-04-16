<?php

namespace Zolli\WebDriver\Remote;

use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface;
use Zolli\WebDriver\Http\HttpCommandExecutorInterface;

class RemoteWindow
{

    /**
     * @var HttpCommandExecutorInterface
     */
    private $executor;

    /**
     * @var HttpCommandFactoryInterface
     */
    private $commandFactory;

    /**
     * RemoteWindow constructor
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
     * Returns the current size of the browser window. This method returns
     * the size oft the BROWSER window itself, not the canvas!
     *
     * @return array
     */
    public function getSize(): array
    {
        $command = $this->commandFactory->createCommand(Commands::GET_WINDOW_SIZE);
        $response = $this->executor->execute($command);

        return [
            'width' => $response['value']['width'],
            'height' => $response['value']['height'],
        ];
    }

    /**
     * Set the size of the current browser window. This method set the CANVAS size of
     * tha browser.
     *
     * @param int $width
     * @param int $height
     */
    public function setSize(int $width, int $height)
    {
        $command = $this->commandFactory->createCommand(Commands::SET_WINDOW_SIZE, [
            'width' => $width,
            'height' => $height,
        ]);

        $this->executor->execute($command);
    }

    /**
     * Returns the current browser position on the screen.
     * The coordinates started from the upper left corner of the screen
     *
     * @return array
     */
    public function getPosition(): array
    {
        $command = $this->commandFactory->createCommand(Commands::GET_WINDOW_POSITION);
        $response = $this->executor->execute($command);

        return [
            'x' => $response['value']['x'],
            'y' => $response['value']['y'],
        ];
    }

    /**
     * Sets the position of the current browser window in the screen
     *
     * @param int $x The distance from X
     * @param int $y The distance from Y
     */
    public function setPosition(int $x, int $y)
    {
        $command = $this->commandFactory->createCommand(Commands::SET_WINDOW_POSITION, [
            'x' => $x,
            'y' => $y,
        ]);

        $this->executor->execute($command);
    }

    /**
     * Maximize the current window.
     * WARNING: This function may be not implemented in many driver and cause exception on selenium side
     */
    public function maximize()
    {
        $command = $this->commandFactory->createCommand(Commands::SET_WINDOW_MAXIMIZED);
        $this->executor->execute($command);
    }

    /**
     * Closes the current window
     */
    public function close()
    {
        $command = $this->commandFactory->createCommand(Commands::CLOSE_CURRENT_WINDOW);
        $this->executor->execute($command);
    }

}
