<?php

namespace Zolli\WebDriver\Tests\Functional\Http\Guzzle;

use PHPUnit\Framework\TestCase;
use Zolli\WebDriver\Http\Command\HttpCommand;
use Zolli\WebDriver\Http\Guzzle\GuzzleHttpCommandExecutor;

class GuzzleCommandExecutorTest extends TestCase
{

    public function testIsReturnsTheResponseAsRawWithGetRequests()
    {
        $executor = new GuzzleHttpCommandExecutor('http://httpbin.org');
        $httpCommand = new HttpCommand(['method' => 'GET', 'url' => '/get']);
        $result = $executor->execute($httpCommand, true);

        $this->assertJson($result);
    }

    public function testIsReturnsTheResponseWithGetRequests()
    {
        $executor = new GuzzleHttpCommandExecutor('http://httpbin.org');
        $httpCommand = new HttpCommand(['method' => 'GET', 'url' => '/get']);
        $result = $executor->execute($httpCommand);

        $this->assertArrayHasKey('args', $result);
    }

    public function testIsReturnsTheResponseWithPostRequests()
    {
        $executor = new GuzzleHttpCommandExecutor('http://httpbin.org');
        $httpCommand = new HttpCommand(['method' => 'POST', 'url' => '/post'], [],  ['test' => 'data']);
        $result = $executor->execute($httpCommand);

        $this->assertArraySubset(['json' => ['test' => 'data']], $result);
        $this->assertArraySubset(['headers' => ['Content-Type' => 'application/json', 'Content-Length' => 15]], $result);
    }

    public function testItReturnsResponseWith500StatusCode()
    {
        $executor = new GuzzleHttpCommandExecutor('http://httpbin.org');
        $httpCommand = new HttpCommand(['method' => 'GET', 'url' => '/status/500']);
        $result = $executor->execute($httpCommand, true);

        $this->assertEquals('', $result);
    }

}