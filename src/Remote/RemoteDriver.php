<?php

namespace Zolli\WebDriver\Remote;

use Zolli\WebDriver\Capability\DesiredCapability;
use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface;
use Zolli\WebDriver\Http\HttpCommandExecutorInterface;

class RemoteDriver
{

    /**
     * @var DesiredCapability
     */
    protected $capability;

    /**
     * @var HttpCommandExecutorInterface
     */
    protected $executor;

    /**
     * @var HttpCommandFactoryInterface
     */
    protected $commandFactory;

    public function __construct(
        DesiredCapability $capability,
        HttpCommandExecutorInterface $executor,
        HttpCommandFactoryInterface $commandFactory
    )
    {
        $this->capability = $capability;
        $this->executor = $executor;
        $this->commandFactory = $commandFactory;

        $this->commandFactory->setDefaultParameter('capabilities', $this->capability->toArray());
    }

    public function getStatus()
    {
        $command = $this->commandFactory->get(Commands::QUERY_STATUS);
        $this->executor->execute($command);
    }

}