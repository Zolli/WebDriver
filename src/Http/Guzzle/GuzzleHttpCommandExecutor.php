<?php

namespace Zolli\WebDriver\Http\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
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
        $options = $this->getOptionsByCommand($command);

        try {
            $response = $this->client->request(
                $command->getMethod(),
                $this->remoteUrl . $command->getSuffixWithArguments(),
                $options
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

    /**
     * Returns a guzzle compatible request options by the http command.
     * If the command is a PUT or POST request the returned array contains the body
     * and the needed Content-Type and Content-Length headers
     *
     * @param HttpCommand $command
     *
     * @return array
     */
    protected function getOptionsByCommand(HttpCommand $command): array
    {
        $body = \GuzzleHttp\json_encode($command->getParameters());
        $returned = [];

        if (in_array($command->getMethod(), ['PUT', 'POST'])) {
            $returned = [
                'body' => $body,
                'headers' => [
                    'Content-Length' => mb_strlen($body),
                    'Content-Type' => 'application/json',
                ]
            ];
        }

        return $returned;
    }

    /**
     * Checks response fro error codes, if found any standard response error code
     * the corresponding exception will be thrown
     *
     * @param array $decodedResponse
     *
     * @throws DriverException
     */
    protected function throwExceptionIfError(array $decodedResponse): void
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