<?php

include './vendor/autoload.php';

$capability = \Zolli\WebDriver\Capability\DesiredCapability::chrome();
$executor = new \Zolli\WebDriver\Http\Guzzle\GuzzleHttpCommandExecutor('http://192.168.1.180:25000/wd/hub');
$commandFactory = new \Zolli\WebDriver\Http\Command\HttpCommandFactory();

$driver = new \Zolli\WebDriver\Remote\RemoteDriver($executor, $commandFactory);
$session = $driver->createSession($capability);
$window = $session->getWindow();
$window->setSize(1920, 1080);
$window->setPosition(0, 0);

$session->navigateTo('http://www.logout.hu');
