<?php

include './vendor/autoload.php';

$capability = \Zolli\WebDriver\Capability\DesiredCapability::chrome();

$executor = new \Zolli\WebDriver\Http\Guzzle\GuzzleHttpCommandExecutor('http://localhost:4444/wd/hub');
$commandFactory = new \Zolli\WebDriver\Http\Command\HttpCommandFactory();
$driver = new \Zolli\WebDriver\Remote\RemoteDriver($executor, $commandFactory);
$session = $driver->createSession($capability);

die(var_dump($session->findElement()));
