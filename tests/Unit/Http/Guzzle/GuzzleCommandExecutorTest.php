<?php

namespace Zolli\WebDriver\Tests\Unit\Http\Guzzle;

use PHPUnit\Framework\TestCase;
use Zolli\WebDriver\Exception\NoSuchDriverException;
use Zolli\WebDriver\Http\Command\HttpCommand;
use Zolli\WebDriver\Http\Guzzle\GuzzleHttpCommandExecutor;

class GuzzleCommandExecutorTest extends TestCase
{

    public function testOptionsCreationReturnsAnEmptyArrayOnGetRequests()
    {
        $executor = new GuzzleHttpCommandExecutor('https://httpbin.org');
        $reflector = new \ReflectionClass($executor);
        $method = $reflector->getMethod('getOptionsByCommand');
        $method->setAccessible(true);

        $httpCommand = new HttpCommand(['method' => 'GET', 'url' => '']);
        $result = $method->invokeArgs($executor, [$httpCommand]);

        $this->assertEquals([], $result);
    }

    public function testOptionsCreationReturnsValidArrayOnGetRequests()
    {
        $executor = new GuzzleHttpCommandExecutor('https://httpbin.org');
        $reflector = new \ReflectionClass($executor);
        $method = $reflector->getMethod('getOptionsByCommand');
        $method->setAccessible(true);

        $httpCommand = new HttpCommand(['method' => 'POST', 'url' => ''], [], ['test' => 'value']);
        $result = $method->invokeArgs($executor, [$httpCommand]);

        $expected = [
            'body' => '{"test":"value"}',
            'headers' => [
                'Content-Length' => 16,
                'Content-Type' => 'application/json',
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testIsNotThrowsExceptionIfTheResponseNotContainsAnError()
    {
        $executor = new GuzzleHttpCommandExecutor('https://httpbin.org');
        $reflector = new \ReflectionClass($executor);
        $method = $reflector->getMethod('throwExceptionIfError');
        $method->setAccessible(true);
        $result = $method->invokeArgs($executor, [[]]);

        $this->assertNull($result);
    }

    public function testIsThrowsExceptionIfTheResponseContainsAnError()
    {
        $this->expectException(NoSuchDriverException::class);
        $this->expectExceptionMessage('testMessage');

        $executor = new GuzzleHttpCommandExecutor('https://httpbin.org');
        $reflector = new \ReflectionClass($executor);
        $method = $reflector->getMethod('throwExceptionIfError');
        $method->setAccessible(true);
        $method->invokeArgs($executor, [['status' => 6, 'value' => ['localizedMessage' => 'testMessage']]]);
    }

}