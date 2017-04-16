<?php

namespace Zolli\WebDriver\Http\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use \InvalidArgumentException;
use Zolli\WebDriver\Exception\DriverException;
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

        try {
            $response = $this->client->request(
                $command->getMethod(),
                $this->remoteUrl . $command->getSuffixWithParameters(),
                $additional
            );
        } catch (ServerException $exception) {
            $response = $exception->getResponse();
        }

        $responseContent = $response->getBody()->getContents();

        if ($asRaw === true) {
            return $responseContent;
        }

        $decodedResponse = \GuzzleHttp\json_decode($responseContent, true);
        $this->throwExceptionIfError($decodedResponse);

        return $decodedResponse;
    }

    protected function throwExceptionIfError($decodedResponse)
    {
        if (isset($decodedResponse['status']) && $decodedResponse['status'] > 0) {
            $exception = DriverException::createByStatus(
                $decodedResponse['status'],
                    $decodedResponse['value']['localizedMessage']
            );

            throw $exception;
        }
    }

}