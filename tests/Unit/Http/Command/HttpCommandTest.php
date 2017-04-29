<?php

namespace Zolli\WebDriver\Tests\Unit\Http\Command;

use PHPUnit\Framework\TestCase;
use Zolli\WebDriver\Exception\MissingUrlArgumentException;
use Zolli\WebDriver\Http\Command\HttpCommand;

class HttpCommandTest extends TestCase
{


    public function createTestHttpCommand($method = 'GET')
    {
        return new HttpCommand(
            [
                'method' => $method,
                'url' => '/session/:sessionId/element/:elementId/details',
            ],
            [
                'sessionId' => '5sf78esf4',
                'elementId' => 5,
            ],
            [
                'test' => 'value',
                'value' => 15,
            ]
        );
    }

    public function testCommandGetters()
    {
        $command = $this->createTestHttpCommand();

        $this->assertEquals([
            'sessionId' => '5sf78esf4',
            'elementId' => 5,
        ], $command->getArguments());

        $this->assertEquals('5sf78esf4', $command->getArgument('sessionId'));
        $this->assertNull($command->getArgument('invalid'));

        $this->assertEquals([
            'test' => 'value',
            'value' => 15,
        ], $command->getParameters());

        $this->assertEquals('value', $command->getParameter('test'));
        $this->assertNull($command->getParameter('invalid'));

        $this->assertEquals('GET', $command->getMethod());
        $this->assertEquals('/session/:sessionId/element/:elementId/details', $command->getRawSuffix());
    }

    public function testGetSuffixWithArgumentsThrowsExceptionWhenAllArgumentMissing()
    {
        $this->expectException(MissingUrlArgumentException::class);
        $this->expectExceptionMessage('The sessionId url argument is missing while preparing the following url: /session/:sessionId/list');

        $command = new HttpCommand([
            'method' => 'POST',
            'url' => '/session/:sessionId/list',
        ]);

        $command->getSuffixWithArguments();
    }

    public function testGetSuffixWithArgumentsThrowsExceptionWhenOneArgumentMissing()
    {
        $this->expectException(MissingUrlArgumentException::class);
        $this->expectExceptionMessage('The elementId url argument is missing while preparing the following url: /session/:sessionId/element/:elementId/details');

        $command = new HttpCommand([
            'method' => 'POST',
            'url' => '/session/:sessionId/element/:elementId/details',
        ],
        [
            'sessionId' => '8s1ec851',
        ]
        );

        $command->getSuffixWithArguments();
    }

    public function testGetSuffixWithArgumentsReturnsTheCorrectSuffix()
    {
        $command = new HttpCommand([
            'method' => 'POST',
            'url' => '/session/:sessionId/element/:elementId/details',
        ],
        [
            'sessionId' => '8s1ec851',
            'elementId' => 15,
        ]
        );

        $this->assertEquals('/session/8s1ec851/element/15/details', $command->getSuffixWithArguments());
    }


}