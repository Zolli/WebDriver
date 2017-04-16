<?php

namespace Zolli\WebDriver\Remote;

use Zolli\WebDriver\Http\HttpCommandExecutorInterface;

class RemoteElement
{

    /**
     * @var HttpCommandExecutorInterface
     */
    private $executor;

    /**
     * @var int
     */
    private $elementId;

    public function __construct(HttpCommandExecutorInterface $executor, int $elementId)
    {
        $this->executor = $executor;
        $this->elementId = $elementId;
    }

}