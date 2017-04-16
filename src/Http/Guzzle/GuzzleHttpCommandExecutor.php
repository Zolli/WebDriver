<?php

namespace Zolli\WebDriver\Http\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use \InvalidArgumentException;
use Zolli\WebDriver\Http\Command\HttpCommand;
use Zolli\WebDriver\Http\HttpCommandExecutorInterface;

/**
 * Guzzle based command executor implementation
 *
 * @package Zolli\WebDriver
 * @subpackage Http\Guzzle
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
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

    /**
     * GuzzleHttpCommandExecutor constructor
     *
     * @param string $remoteUrl
     */
    public function __construct(string $remoteUrl)
    {
        $this->remoteUrl = $remoteUrl;
        $this->client = new Client();
    }

    /**
     * @inheritdoc
     */
    public function execute(HttpCommand $command, bool $asRaw = false)
    {
        $body = json_encode($command->getParameters());

        $additional = [];

        if (in_array($command->getMethod(), ['PUT', 'POST']))
        {
            $additional = [
                'body' => $body,
                'headers' => [
                    'Content-Length' => strlen($body),
                    'Content-Type' => 'application/json',
                ]
            ];
        }

        $response = $this->client->request(
            $command->getMethod(),
            $this->remoteUrl . $command->getSuffixWithParameters(),
            $additional
        );

        $responseContent = $response->getBody()->getContents();

        if ($asRaw === true) {
            return $responseContent;
        }

        return \GuzzleHttp\json_decode($responseContent, true);
    }

}