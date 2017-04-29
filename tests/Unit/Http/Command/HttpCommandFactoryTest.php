<?php

namespace Zolli\WebDriver\Tests\Unit\Http\Command;

use PHPUnit\Framework\TestCase;
use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Exception\MissingUrlMappingException;
use Zolli\WebDriver\Http\Command\HttpCommand;
use Zolli\WebDriver\Http\Command\HttpCommandFactory;

class HttpCommandFactoryTest extends TestCase
{

    public function testItStoresDefaultArgumentSpecifiedAsArray()
    {
        $defaultValues = [
            'test' => 'value',
            'version' => 38,
        ];

        $httpCommandFactory = new HttpCommandFactory();
        $httpCommandFactory->setDefaultArguments($defaultValues);

        $reflector = new \ReflectionClass($httpCommandFactory);
        $property = $reflector->getProperty('arguments');
        $property->setAccessible(true);
        $store = $property->getValue($httpCommandFactory);

        $this->assertEquals($defaultValues, $store);
    }

    public function testItStoresDefaultArgumentSpecifiedByMultipleCalls()
    {
        $defaultValues = [
            'test' => 'value',
            'version' => 38,
        ];

        $httpCommandFactory = new HttpCommandFactory();
        $httpCommandFactory->setDefaultArgument('test', 'value');
        $httpCommandFactory->setDefaultArgument('version', 38);

        $reflector = new \ReflectionClass($httpCommandFactory);
        $property = $reflector->getProperty('arguments');
        $property->setAccessible(true);
        $store = $property->getValue($httpCommandFactory);

        $this->assertEquals($defaultValues, $store);
    }

    public function testItThrowsExceptionWhenInvalidCommandSpecified()
    {
        $this->expectException(MissingUrlMappingException::class);
        $this->expectExceptionMessage('The INVALID command not mapped by this class!');

        $httpCommandFactory = new HttpCommandFactory();
        $httpCommandFactory->createCommand('INVALID');
    }

    public function testItCreatesCommandClassWithValidCommands()
    {
        $httpCommandFactory = new HttpCommandFactory();
        $command = $httpCommandFactory->createCommand(Commands::CREATE_SESSION);

        $this->assertInstanceOf(HttpCommand::class, $command);
    }

    public function testItMergesArgumentsCorrectly()
    {
        $httpCommandFactory = new HttpCommandFactory();
        $httpCommandFactory->setDefaultArguments(['session' => '7egt8n1zt89n', 'version' => 38]);
        $command = $httpCommandFactory->createCommand(Commands::CREATE_SESSION, [], ['custom' => 'value']);

        $expectedArgs = [
            'session' => '7egt8n1zt89n',
            'version' => 38,
            'custom' => 'value',
        ];

        $this->assertEquals($expectedArgs, $command->getArguments());
    }

    public function testItMergesAndOverridesArgumentsCorrectly()
    {
        $httpCommandFactory = new HttpCommandFactory();
        $httpCommandFactory->setDefaultArguments(['session' => '7egt8n1zt89n', 'version' => 38]);
        $command = $httpCommandFactory->createCommand(Commands::CREATE_SESSION, [], ['version' => 3]);

        $expectedArgs = [
            'session' => '7egt8n1zt89n',
            'version' => 3,
        ];

        $this->assertEquals($expectedArgs, $command->getArguments());
    }

}