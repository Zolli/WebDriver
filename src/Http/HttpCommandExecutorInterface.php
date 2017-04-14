<?php

namespace Zolli\WebDriver\Http;

use Psr\Http\Message\ResponseInterface;
use Zolli\WebDriver\Http\Command\HttpCommand;

interface HttpCommandExecutorInterface
{

    public function execute(HttpCommand $command): ResponseInterface;

}