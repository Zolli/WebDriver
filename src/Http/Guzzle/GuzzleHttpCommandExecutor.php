<?php

namespace Zolli\WebDriver\Http\Guzzle;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Zolli\WebDriver\Http\Command\HttpCommand;
use Zolli\WebDriver\Http\HttpCommandExecutorInterface;

class GuzzleHttpCommandExecutor implements HttpCommandExecutorInterface
{

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $remoteUrl;

    public function __construct(string $remoteUrl)
    {
        $this->remoteUrl = $remoteUrl;
        $this->client = new Client();
    }

    public function execute(HttpCommand $command): ResponseInterface
    {
        $response = $this->client->request($command->getMethod(), $this->remoteUrl . $command->getSuffixWithParameters());
        var_dump($response);
    }

}